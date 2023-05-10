<?php
session_start();
include_once "php/config.php";
$user_id = "4";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Chatbot</title>
    <!-- imports  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="../../views/js/notify.min.js"></script> -->
    <link href="style/chatbot.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <!-- <header> -->
    <div id="header" class="header">
      <div id="companyImageDiv" class="company-image">
        <nav class="navbar navbar-expand-lg navbar-light p-0"><img class="nav-logo" src="images/chat.png" alt=""  style="height: 40px";>&nbsp;&nbsp;&nbsp;
      <span class="content">Unified Support Team<br><p class="text">We are online to assist you</p></span>    <div class="dropdown">
        <!-- three dots -->
        <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown()">
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <!-- menu -->
        <div id="myDropdown" class="dropdown-content">
          <a href="#">End Chat</a>
        </div>
      </div>
      </div>
    </nav>
    </div>
    <!-- </header> onClick="onClickHandler(event)" sonal -->
    <div id="normal-container">
      <div id="conversation-container" class="conversation-container" style="margin-top:1rem;"></div>
      <p style="height: 60px"></p>
      <!-- <div id="typing-indicator" class="typing-indicator" style="display:none;">
      <div class="typing-indicator-dot"></div>
      <div class="typing-indicator-dot"></div>
      <div class="typing-indicator-dot"></div>
      </div> -->
      <div class="input-container">
        <input type="text" id="incoming_id" name="incoming_id" value="<?php if($_SESSION['unique_id'] == "33099"){ echo "46663"; } else { echo "33099"; } ?>" hidden>
        <input tabindex="1" name="message" id="usrinput" type="text" class="text-input" rows="1" placeholder="Type your message here..." autocomplete="off"/>
        &nbsp;
        <button type="submit" onclick="processAttachment()" class="paperclip" id="attachment-input-btn">
               <i class="fa-sharp fa-solid fa-paperclip fa-lg" style="color: #000000;"></i>
               <input type="file" onchange="uploadAttachment()" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="attachment" id="attachment-input" style="display: none;">
        </button> &nbsp;
        <button type="submit" class="send" id="sendbtn"><i class="fa-sharp fa-solid fa-paper-plane fa-lg" style="color: #000000;"></i></button>
      </div>
    </div>
  </body>
  <script src="javascript/chatbot.js"></script>
</html>

