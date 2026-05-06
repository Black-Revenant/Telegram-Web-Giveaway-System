# 🔥 TELEGRAM GIVEAWAY BOT SYSTEM 🔥

<p align="center">
  <b>⚡ Advanced Web App Based Giveaway Bot ⚡</b>
</p>

---

<p align="center">
  <img src="https://img.shields.io/badge/STATUS-ACTIVE-00ff88?style=for-the-badge">
  <img src="https://img.shields.io/badge/VERSION-v1.0-blue?style=for-the-badge">
  <img src="https://img.shields.io/badge/API-SUPERFAST⚡-orange?style=for-the-badge">
  <img src="https://img.shields.io/badge/MADE%20BY-r4yhn.exe-red?style=for-the-badge">
</p>

---

<p align="center">
  <img src="https://readme-typing-svg.herokuapp.com?color=00F7FF&size=26&center=true&vCenter=true&width=700&lines=Telegram+Giveaway+System;Auto+Winner+Selection;Secure+Web+App;Admin+Control+Panel">
</p>


--------------------------------------------------

<h2 align="center">
  <img src="https://media.giphy.com/media/26ufdipQqU2lhNA4g/giphy.gif" width="30">
   FEATURES
  <img src="https://media.giphy.com/media/26ufdipQqU2lhNA4g/giphy.gif" width="30">
</h2>

<p align="center">
  <img src="https://img.shields.io/badge/⚡-REALTIME_UPDATES-00ffcc?style=for-the-badge">
  <img src="https://img.shields.io/badge/🎲-AUTO_WINNER-ffcc00?style=for-the-badge">
  <img src="https://img.shields.io/badge/🔒-SECURE_ACCESS-ff4444?style=for-the-badge">
</p>

<br>

<table align="center">
<tr>
<td align="center">

### 🎯 Web App Integration  
Run giveaway directly inside Telegram Web App  

</td>

<td align="center">

### 🎲 Random Winner  
100% fair automatic winner selection system  

</td>
</tr>

<tr>
<td align="center">

### ⚡ Live Updates  
No refresh needed, everything updates instantly  

</td>

<td align="center">

### 🎛️ Admin Panel  
Control start, stop & re-roll easily  

</td>
</tr>

<tr>
<td align="center">

### 🔒 Secure System  
Only Telegram users allowed access  

</td>

<td align="center">

### 📱 Responsive UI  
Works smoothly on mobile & desktop  

</td>
</tr>

<tr>
<td align="center">

### 🎉 Winner Animation  
Cool popup + celebration effects  

</td>

<td align="center">

### 🚀 Fast Performance  
Optimized backend with instant response  

</td>
</tr>
</table>



--------------------------------------------------

<h2 align="center">
  <img src="https://media.giphy.com/media/l0HlQ7LRalQqdWfao/giphy.gif" width="30">
   HOW IT WORKS
  <img src="https://media.giphy.com/media/l0HlQ7LRalQqdWfao/giphy.gif" width="30">
</h2>

<p align="center">
  <img src="https://img.shields.io/badge/FLOW-AUTOMATED-00d2ff?style=for-the-badge">
</p>

<br>

<table align="center">
<tr>
<td align="center">

### 👤 Step 1  
User opens the Telegram Bot  

</td>

<td align="center">

### 🌐 Step 2  
Clicks **Open Giveaway** → Web App loads  

</td>
</tr>

<tr>
<td align="center">

### 🎯 Step 3  
User clicks **JOIN** button  

</td>

<td align="center">

### 💾 Step 4  
User data saved in database  

</td>
</tr>

<tr>
<td align="center">

### 🛡️ Step 5  
Admin monitors & controls giveaway  

</td>

<td align="center">

### ⏹️ Step 6  
Admin stops giveaway  

</td>
</tr>

<tr>
<td align="center">

### 🎲 Step 7  
System selects random winner  

</td>

<td align="center">

### 🎉 Step 8  
Winner gets Telegram notification  

</td>
</tr>
</table>

<br>

<p align="center">
  🔥 Fully Automated • No Manual Work • Fair Selection System
</p>

--------------------------------------------------

<h2 align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/189/189792.png" width="28">
   SETUP GUIDE
  <img src="https://cdn-icons-png.flaticon.com/512/189/189792.png" width="28">
</h2>

<h3 align="center">🚀 Step 1: Environment Setup</h3>

<p align="center">
  <img src="https://img.shields.io/badge/REQUIRED-SYSTEM_SETUP-00d2ff?style=for-the-badge">
</p>

<br>

<table align="center">
<tr>
<td align="center">

### 🌐 Domain  
You need a working domain  
Example: `yourdomain.com`

</td>

<td align="center">

### 🖥️ Hosting / VPS  
Use cPanel, DirectAdmin or VPS server  

</td>
</tr>

<tr>
<td align="center">

### 🐘 PHP Version  
PHP **7.4 or higher** required  

</td>

<td align="center">

### 🗄️ Database  
MySQL or MariaDB required  

</td>
</tr>

<tr>
<td align="center">

### 🔗 SSL Certificate  
HTTPS must be enabled for webhook  

</td>

<td align="center">

### 🤖 Telegram Bot  
Create bot using BotFather  

</td>
</tr>
</table>

<br>

<p align="center">
  ⚡ Make sure all requirements are ready before moving to next step
</p>

--------------------------------------------------

<h3 align="center">🗄️ Step 2: Database Setup</h3>

<p align="center">
  <img src="https://img.shields.io/badge/DATABASE-MYSQL_READY-00ff99?style=for-the-badge">
</p>

<br>

<table align="center">
<tr>
<td align="center">

### 🧱 Create Database  
Create a new database  
Example: `giveaway_db`

</td>

<td align="center">

### ⚙️ Open phpMyAdmin  
Go to hosting panel → phpMyAdmin  

</td>
</tr>

<tr>
<td align="center">

### 📥 Import Tables  
Run SQL queries in SQL tab  

</td>

<td align="center">

### ✅ Verify Setup  
Check tables are created successfully  

</td>
</tr>
</table>

---

### 📌 SQL TABLE STRUCTURE

```sql
CREATE TABLE IF NOT EXISTS `giveaway_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('active','stopped') DEFAULT 'stopped',
  `prize` varchar(255) DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `winner_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_url` text,
  `join_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
);
```

---

<p align="center">
  ⚡ Make sure tables are created before moving to next step
</p>

--------------------------------------------------

<h3 align="center">🧩 Step 3: Configure Files</h3>

<p align="center">
  <img src="https://img.shields.io/badge/CONFIG-EDIT_FILES-ffaa00?style=for-the-badge">
</p>

<br>

<table align="center">
<tr>
<td align="center">

### 🗄️ db.php  
Add your database credentials  

</td>

<td align="center">

### 🤖 bot.php  
Add bot token, admin ID & web app URL  

</td>
</tr>

<tr>
<td align="center">

### ⚙️ api.php  
Add bot token & admin ID  

</td>

<td align="center">

### 🌐 index.html  
Add admin Telegram ID  

</td>
</tr>
</table>

---

 <h2 align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/906/906324.png" width="28">
  FILE CONFIGURATION DETAILS
  <img src="https://cdn-icons-png.flaticon.com/512/906/906324.png" width="28">
</h2>

### 🗄️ db.php
```php
your_db_name  
your_db_user  
your_db_password  
```

---

### 🤖 bot.php
```php
PASTE_YOUR_BOT_TOKEN (Line No. 6)
PASTE_YOUR_TG_ID (Line No. 10)
https://YourDomain.com/index.html (Line No. 43)
```

---

### ⚙️ api.php
```php
PASTE_YOUR_BOT_TOKEN (Line No. 7 & 140)
PASTE_YOUR_TG_ID (Line No. 8)
```

---

### 🌐 index.html
```js
PASTE_YOUR_TG_ID  (Line No. 91)
```

---

<p align="center">
  ⚡ Make sure all values are correctly updated before proceeding
</p>

--------------------------------------------------

<h3 align="center">🔗 Step 4: Webhook Setup</h3>

<p align="center">
  <img src="https://img.shields.io/badge/WEBHOOK-CONNECTED-00ccff?style=for-the-badge">
</p>

<br>

<table align="center">
<tr>
<td align="center">

### 🌐 Connect Bot  
Link your bot with server  

</td>

<td align="center">

### ⚡ Real-Time Updates  
Bot will receive instant updates  

</td>
</tr>
</table>

---

## 📌 Set Webhook URL

Paste this in your browser:

```bash
https://api.telegram.org/bot<TOKEN>/setWebhook?url=https://yourdomain.com/bot.php
```

---

## ✅ Success Response

If setup is correct, you will see:

```
{"ok":true,"result":true}
```

---

<p align="center">
  ⚡ Your bot is now live and connected to server
</p>

--------------------------------------------------


## 👤 User Interface

<p align="center">
  <img src="SAMPLE OUTPUT/user-interface.jpg" width="80%">
</p>

<p align="center">
  🎯 Live Giveaway • Join Button • Participants List • Timer System
</p>

---

## 🛡️ Admin Panel

<p align="center">
  <img src="SAMPLE OUTPUT/admin-panel.jpg" width="80%">
</p>

<p align="center">
  🎛️ Control Giveaway • Start • Stop & Pick • Re-roll Winner
</p>

--------------------------------------------------


<p align="center">
  <a href="https://youtube.com/@ssk-spidy-07">
    <img src="https://img.shields.io/badge/📺%20YouTube-SUBSCRIBE-FF0000?style=for-the-badge&logo=youtube">
  </a>
  <a href="https://instagram.com/r4yhn.exe">
    <img src="https://img.shields.io/badge/📸%20Instagram-FOLLOW-E4405F?style=for-the-badge&logo=instagram">
  </a>
  <a href="https://t.me/Spidyisalive">
    <img src="https://img.shields.io/badge/💬%20Telegram-JOIN-0088cc?style=for-the-badge&logo=telegram">
  </a>
</p>

--------------------------------------------------

<h2 align="center">⭐ Support & Contribution</h2>

<p align="center">
  <img src="https://img.shields.io/badge/SUPPORT-OPEN_SOURCE-ff66cc?style=for-the-badge">
</p>

<br>

<p align="center">
  If you like this project, show some love ❤️
</p>

<p align="center">
  ⭐ <b>Star</b> the repository <br>
  🍴 <b>Fork</b> and customize it <br>
  📢 <b>Share</b> with your friends <br>
  🚀 Build something amazing
</p>

<br>

<p align="center">
  <a href="#">
    <img src="https://img.shields.io/badge/⭐_STAR_THIS_REPO-SUPPORT-ffd700?style=for-the-badge">
  </a>
  <a href="#">
    <img src="https://img.shields.io/badge/🍴_FORK_PROJECT-CONTRIBUTE-00c3ff?style=for-the-badge">
  </a>
  <a href="#">
    <img src="https://img.shields.io/badge/📢_SHARE_PROJECT-SPREAD-ff4444?style=for-the-badge">
  </a>
</p>

---

<h2 align="center">💙 Best Wishes</h2>

<p align="center">
  🚀 Wishing you success in your projects <br>
  💡 Keep learning & building <br>
  🔥 Turn your ideas into reality <br>
</p>

<br>

<p align="center">
  <b>Made with ❤️ for Developers</b>
</p>

--------------------------------------------------










