const incomingId = document.getElementById("incoming_id");
const inputField = document.querySelector(".text-input");
const sendBtn = document.querySelector(".send");
const chatBox = document.getElementById("conversation-container");
const attachmentInput = document.getElementById("attachment-input");
var normalContainer = document.getElementById("normal-container");
const messageInput = document.getElementById("usrinput");
const attachmentInputBtn = document.getElementById("attachment-input-btn");
var keepFetching = true;
const baseUrl = "http://localhost/chatbot/";

inputField.focus();

function scrollToBottom() {
  $("html, body").animate(
    {
      scrollTop: $(window).scrollTop() + chatBox.scrollHeight + 50,
    },
    "slow"
  );
}
$(document).ready(() => {
  scrollToBottom();
});

// window.onload = function() {
//   scrollToBottom();
// };

inputField.addEventListener("keyup", () => {
  if (inputField.value !== "") {
    sendBtn.classList.add("active");
  } else {
    sendBtn.classList.remove("active");
  }
});

sendBtn.addEventListener("click", sendMessage);
messageInput.addEventListener("keypress", (event) => {
  if (event.key === "Enter") {
    scrollToBottom();
    sendMessage();
  }
});

function sendMessage() {
  fetch(
    `${baseUrl}php/insert-chat.php?incoming_id=${
      incomingId.value
    }&message=${encodeURI(inputField.value)}`
  )
    .then((rsp) => rsp.text())
    .then((data) => {
      inputField.value = "";
      scrollToBottom();

    });
}

attachmentInput.onchange = uploadAttachment;

function processAttachment() {
  attachmentInput.click();
}

function uploadAttachment() {
  const files = attachmentInput.files;
  if (files.length > 0) {
    // inputField.value = files[0].name;
    const formData = new FormData();
    formData.append("attachment", files[0]);
    formData.append("incoming_id", incomingId.value);
    formData.append("message", inputField.value);
    fetch(`${baseUrl}php/upload-attachment.php`, {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        inputField.value = "";
        // Handle response from server if needed
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

setInterval(() => {
  fetch(`${baseUrl}php/get-chat.php?incoming_id=${incomingId.value}`)
    .then((rsp) => rsp.text())
    .then((data) => {
      if(keepFetching == true){
        chatBox.innerHTML = data;
      }
      
    });
}, 1000);

function changeLanguage(language) {
  const element = document.getElementById("url");
  element.value = language;
  element.innerHTML = language;
}

function showDropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = (event) => {
  if (!event.target.matches(".dropbtn")) {
    const dropdowns = document.getElementsByClassName("dropdown-content");
    for (let i = 0; i < dropdowns.length; i++) {
      const openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};


const endChatBtn = document.querySelector("#myDropdown a");

endChatBtn.addEventListener("click", () => {
  keepFetching = false;
  const message = document.createElement("div");
  // message.classList.add("message", "system-message");
  // message.textContent = "Chat session ended. Thank you for using our service. You can start a new chat anytime.";
  // chatBox.appendChild(message);
  chatBox.innerHTML += `
    <div class="" style="text-align:center; margin-top:40px;">
    Chat session ended. Thank you for using our service. You can start a new chat anytime.
    </div>
  `;

  inputField.style.display = "none";
  sendBtn.style.display = "none";
  attachmentInputBtn.style.display = "none";

  inputField.disabled = true;
  sendBtn.disabled = true;
  attachmentInputBtn.disabled = true;

  sendBtn.classList.remove("active");
});

// const typingIndicator = document.getElementById("typing-indicator");

// messageInput.addEventListener("keydown", function() {
//   typingIndicator.style.display = "flex";
// });

// messageInput.addEventListener("keyup", function() {
//   typingIndicator.style.display = "none";
// });
