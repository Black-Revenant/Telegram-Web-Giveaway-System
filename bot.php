<?php
// bot.php
require 'db.php';

// CONFIGURATION
define('BOT_TOKEN', 'PASTE_YOUR_BOT_TOKEN'); // New Token
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

// Admin ID
define('ADMIN_ID', PASTE_YOUR_TG_ID); //12345678

// FUNCTION: Send Request to Telegram
function botRequest($method, $params = []) {
    $url = API_URL . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
}

// Get Update from Telegram
 $content = file_get_contents("php://input");
 $update = json_decode($content, true);

if (!$update) {
    exit;
}

 $message = $update['message'];
 $chat_id = $message['chat']['id'];
 $user_id = $message['from']['id'];
 $text = $message['text'] ?? '';

// --- COMMANDS ---

// 1. /start - Open App with Web App Button
if ($text == '/start') {
    // Web App URL
    $app_url = "https://YourDomain.com/index.html";
    
    // Web App Button (Opens inside Telegram)
    $reply_markup = json_encode([
        'inline_keyboard' => [[
            ['text' => '🎁 Open Giveaway', 'web_app' => ['url' => $app_url]]
        ]]
    ]);
    
    botRequest('sendMessage', [
        'chat_id' => $chat_id, 
        'text' => "Welcome to the Official Giveaway! 🎁\n\nClick the button below to open the lucky draw interface.", 
        'reply_markup' => $reply_markup
    ]);
}

// 2. /broadcast (Admin only)
if ($user_id == ADMIN_ID && $text == '/broadcast') {
    // Fetch all participants
    $stmt = $pdo->query("SELECT user_id FROM participants");
    $users = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $count = 0;
    $msg_text = "📢 NEW GIVEAWAY ALERT! A new event has started. Join now to win exciting prizes!";
    
    foreach ($users as $uid) {
        botRequest('sendMessage', [
            'chat_id' => $uid, 
            'text' => $msg_text
        ]);
        $count++;
        // Small delay to avoid API limits (optional)
        usleep(300000); // 0.3 seconds
    }
    
    botRequest('sendMessage', [
        'chat_id' => $chat_id, 
        'text' => "✅ Broadcast sent successfully to $count users."
    ]);
}

// 3. /stats (Admin only - Check count)
if ($user_id == ADMIN_ID && $text == '/stats') {
    $count = $pdo->query("SELECT COUNT(*) FROM participants")->fetchColumn();
    botRequest('sendMessage', [
        'chat_id' => $chat_id, 
        'text' => "📊 Current Statistics:\n\nTotal Participants: $jaid_count"
    ]);
}
?>
