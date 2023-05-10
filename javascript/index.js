var urlConstant="";
if (!window.jQuery || !window.hasOwnProperty("$") || !window.$.hasOwnProperty("ajax")) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src =
        "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js";
    document.getElementsByTagName("head")[0].appendChild(script);
    script.onload = function () {
        loadBasicImports();
    }
} else {
    $(document).ready(() => {
        loadBasicImports();
    });
}

function loadBasicImports() {
    const chatbotCdnCss = document.createElement("link");
    chatbotCdnCss.href = urlConstant + "style/index.css";
    chatbotCdnCss.type = "text/css";
    chatbotCdnCss.rel = "stylesheet";
    chatbotCdnCss.media = "screen,print";
    document.getElementsByTagName("head")[0].appendChild(chatbotCdnCss);
    loadChatbot();
}

function loadChatbot() {
    var iframeDiv = document.createElement("div");
    iframeDiv.id = "diviframe";
    var input = document.createElement("input");
    input.type = "image";
    input.src = "images/chat.png";
    input.className = "fixed_button";
    input.className += " position_right ";
    input.id = "chatbotBtnImg";
    input.style.padding = "8px";
    input.addEventListener("click", openChatbot);
    var iframe = document.createElement("iframe");
    // iframe.src = urlConstant + "/chatbot/company/" + chatbotData.chatbotScriptId + "?baseUrl=" + encodeURIComponent(window.location.href);
    iframe.src = urlConstant + "chatbot.php";
    iframe.id = "chatbotIframe";
    iframe.className = "iframeDiv";
    iframe.className += " position_right ";
    iframe.className += " large_iframe ";
    iframe.style.display = "none";
    document.getElementsByTagName("body")[0].appendChild(iframeDiv);
    document.getElementsByTagName("body")[0].appendChild(input);
    iframeDiv.appendChild(iframe);
  }

  function openChatbot() {
    var image = document.getElementById("chatbotBtnImg");
    var x = document.getElementById("chatbotIframe");
    if (x.style.display === "none") {
      x.style.display = "block";
      image.src = urlConstant + "images/close.png";
      image.style.padding = "3px";
    } else {
      x.style.display = "none";
      image.src = "images/chat.png";
      image.style.padding = "8px";
    }
  }
