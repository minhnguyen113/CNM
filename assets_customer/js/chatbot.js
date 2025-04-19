// Initialize Lucide icons
lucide.createIcons();

// DOM Elements
const chatButton = document.getElementById('chatButton');
const chatWindow = document.getElementById('chatWindow');
const closeButton = document.getElementById('closeButton');
const messages = document.getElementById('messages');
const loading = document.getElementById('loading');
const chatInput = document.getElementById('chatInput');
const sendButton = document.getElementById('sendButton');

// Event Listeners
chatButton.addEventListener('click', () => {
    chatWindow.classList.add('open');
    chatButton.style.display = 'none';
});

closeButton.addEventListener('click', () => {
    chatWindow.classList.remove('open');
    chatButton.style.display = 'block';
});

chatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        handleSend();
    }
});

sendButton.addEventListener('click', handleSend);

// Tạo tin nhắn đơn giản
function createMessage(text, isBot = false, isHTML = false) {
    const wrapper = document.createElement('div');
    wrapper.className = `message-wrapper ${isBot ? 'bot' : 'user'}`;

    const message = document.createElement('div');
    message.className = `message ${isBot ? 'bot' : 'user'}`;
    if (isHTML) {
        message.innerHTML = text;
    } else {
        message.textContent = text;
    }

    wrapper.appendChild(message);
    return wrapper;
}

// Xử lý gửi tin nhắn
function handleSend() {
    const text = chatInput.value.trim();
    if (!text) return;

    messages.appendChild(createMessage(text, false));
    chatInput.value = '';
    messages.scrollTop = messages.scrollHeight;

    loading.classList.add('active');

    fetch("controller/cChatbot.php", {
        method: "POST",
        body: new URLSearchParams({ message: text })
    })
    .then(res => res.json())
    .then(data => {
        loading.classList.remove('active');

        if (!data.success) {
            messages.appendChild(createMessage("❌ Lỗi khi xử lý, vui lòng thử lại sau.", true));
            return;
        }

        switch (data.type) {
            case "greeting":
            case "unknown":
                messages.appendChild(createMessage(data.message, true));
                break;

            case "result":
            case "suggestion":
                messages.appendChild(createMessage("📋 Dạ, nhà hàng chúng tôi có các món sau nhé:", true));
                data.data.forEach(mon => {
                    messages.appendChild(createMessage(`
                        🍽️ <b>${mon.tenMon}</b><br>
                        💰 <b>Giá:</b> ${mon.gia}<br>
                        📄 <b>Thực đơn:</b> ${mon.thucDon}<br>
                        🔗 <a href="#">Xem chi tiết</a>
                    `, true, true));
                });
                break;

            default:
                messages.appendChild(createMessage("🤖 Em chưa rõ câu hỏi của anh/chị ạ!", true));
        }

        messages.scrollTop = messages.scrollHeight;
    })
    .catch(err => {
        loading.classList.remove('active');
        messages.appendChild(createMessage("🚫 Có lỗi xảy ra khi kết nối với máy chủ.", true));
    });
}

