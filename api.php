<?php
// api.php
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');
require 'db.php';

define('BOT_TOKEN', 'PASTE_YOUR_BOT_TOKEN');
define('ADMIN_ID', PASTE_YOUR_TG_ID); 

 $input = json_decode(file_get_contents("php://input"), true);
 $action = $input['action'] ?? '';
 $user_id = $input['user_id'] ?? 0;

try {
    // 1. GET DATA
    if ($action == 'get_data') {
        $stmt = $pdo->query("SELECT * FROM giveaway_config ORDER BY id DESC LIMIT 1");
        $config = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$config) {
            $config = ['status' => 'stopped', 'prize' => 'TBA', 'end_time' => null];
        }

        $p_stmt = $pdo->query("SELECT name, photo_url FROM participants ORDER BY join_time DESC LIMIT 50");
        $participants = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $pdo->query("SELECT COUNT(*) FROM participants")->fetchColumn();

        $config['participants'] = $participants;
        $config['participant_count'] = $count;

        echo json_encode($config);
        exit;
    }

    // 2. JOIN
    if ($action == 'auto-join') {
        $stmt = $pdo->query("SELECT status FROM giveaway_config WHERE status = 'active' LIMIT 1");
        $status = $stmt->fetchColumn();

        if ($status !== 'active') {
            echo json_encode(['status' => 'error', 'message' => 'Not active']);
            exit;
        }

        $name = $input['name'] ?? 'Unknown';
        $photo = $input['photo_url'] ?? '';
        
        $stmt = $pdo->prepare("INSERT IGNORE INTO participants (user_id, name, photo_url) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $name, $photo]);

        echo json_encode(['status' => 'success', 'message' => 'Joined!']);
        exit;
    }

    // 3. ADMIN ACTIONS
    if ($user_id == ADMIN_ID) {
        
        // START
        if ($action == 'start_giveaway') {
            $prize = $input['prize'] ?? 'Mystery';
            
            // FIX: Large number handle (interval removes decimals, ensures number)
            $duration = intval($input['duration'] ?? 0);
            
            $pdo->query("DELETE FROM participants");
            $pdo->query("TRUNCATE TABLE giveaway_config");
            
            // Calculate Time
            $current_time = time();
            $duration_seconds = $duration * 60;
            $end_timestamp = $current_time + $duration_seconds;
            $end_time = date('Y-m-d H:i:s', $end_timestamp);
            
            $stmt = $pdo->prepare("INSERT INTO giveaway_config (status, prize, end_time) VALUES (?, ?, ?)");
            $stmt->execute(['active', $prize, $end_time]);
            
            echo json_encode(['status' => 'success', 'message' => 'Started!', 'end_time' => $end_time]);
            exit;
        }

        // STOP & PICK
        if ($action == 'stop_giveaway') {
            $cfg = $pdo->query("SELECT prize FROM giveaway_config WHERE status='active' LIMIT 1")->fetch();
            $prize_name = $cfg ? $cfg['prize'] : 'Prize';

            $res = $pdo->query("SELECT user_id FROM participants ORDER BY RAND() LIMIT 1");
            $winner = $res->fetch(PDO::FETCH_ASSOC);

            if ($winner) {
                $wid = $winner['user_id'];
                $upd = $pdo->prepare("UPDATE giveaway_config SET status='stopped', winner_id=? WHERE status='active'");
                $upd->execute([$wid]);

                $w_stmt = $pdo->prepare("SELECT * FROM participants WHERE user_id = ?");
                $w_stmt->execute([$wid]);
                $w_data = $w_stmt->fetch(PDO::FETCH_ASSOC);
                
                $msg = "🏆 CONGRATULATIONS! 🏆\n\nYou won: $prize_name\n\nContact @M0vie_C0pyRight to claim.";
                sendTelegramMessage($wid, $msg);

                echo json_encode(['status' => 'success', 'winner_id' => $wid, 'winner_name' => $w_data['name']]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No participants']);
            }
            exit;
        }

        // RE-ROLL
        if ($action == 'reroll') {
            $cur = $pdo->query("SELECT winner_id FROM giveaway_config ORDER BY id DESC LIMIT 1")->fetch();
            $cur_id = $cur ? $cur['winner_id'] : 0;

            $stmt = $pdo->prepare("SELECT user_id FROM participants WHERE user_id != ? ORDER BY RAND() LIMIT 1");
            $stmt->execute([$cur_id]);
            $new_winner = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($new_winner) {
                $new_id = $new_winner['user_id'];
                $upd = $pdo->prepare("UPDATE giveaway_config SET winner_id=? WHERE id=(SELECT MAX(id) FROM giveaway_config)");
                $upd->execute([$new_id]);
                
                $msg = "🎉 NEW WINNER! 🎉\n\nContact @M0vie_C0pyRight immediately.";
                sendTelegramMessage($new_id, $msg);

                echo json_encode(['status' => 'success', 'winner_id' => $new_id]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Cannot re-roll']);
            }
            exit;
        }
    }

    echo json_encode(['status' => 'error', 'message' => 'Invalid Action']);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error']);
}

function sendTelegramMessage($chat_id, $text) {
    $token = 'PASTE_YOUR_BOT_TOKEN';
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = ['chat_id' => $chat_id, 'text' => $text, 'parse_mode' => 'HTML'];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}
?>
