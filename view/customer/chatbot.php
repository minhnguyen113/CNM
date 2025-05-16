<div class="chef-botchat">
    <div class="chat-widget">
        <button class="chat-button" id="chatButton">
            <i data-lucide="chef-hat"></i>
        </button>

        <div class="chat-window" id="chatWindow">
            <div class="chat-header">
                <div class="header-content">
                    <div class="avatar">
                        <i data-lucide="chef-hat"></i>
                    </div>
                    <span class="header-title">Chef Assistant</span>
                </div>
                <button class="close-button" id="closeButton">
                    <i data-lucide="x"></i>
                </button>
            </div>

            <div class="messages" id="messages">
                <div class="loading" id="loading">
                    <div class="loading-bubble">
                        <div class="loading-dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-area">
                <div class="input-wrapper">
                    <input type="text" class="chat-input" id="chatInput" placeholder="Type your message..." />
                    <button class="send-button" id="sendButton">
                        <i data-lucide="send"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeButton = document.getElementById('closeButton');
    const chatInput = document.getElementById('chatInput');
    const sendButton = document.getElementById('sendButton');
    const messages = document.getElementById('messages');
    const loading = document.getElementById('loading');

    function createMessage(text, isBot) {
        const wrapper = document.createElement('div');
        wrapper.className = `message-wrapper ${isBot ? 'bot' : 'user'}`;

        const message = document.createElement('div');
        message.className = `message ${isBot ? 'bot' : 'user'}`;
        message.innerHTML = text;

        wrapper.appendChild(message);
        return wrapper;
    }

    function showLoading() {
        loading.classList.add('active');
    }

    function hideLoading() {
        loading.classList.remove('active');
    }

    function showTypingIndicator() {
        const typingWrapper = document.createElement('div');
        typingWrapper.className = 'message-wrapper';
        typingWrapper.id = 'typingIndicator';

        const typingDiv = document.createElement('div');
        typingDiv.className = 'message bot';
        typingDiv.innerHTML = '<em>Trợ lý đang nhập...</em>';

        typingWrapper.appendChild(typingDiv);
        messages.appendChild(typingWrapper);
        messages.scrollTop = messages.scrollHeight;
    }

    function hideTypingIndicator() {
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function handleSend() {
        const text = chatInput.value.trim();
        if (!text) return;

        messages.appendChild(createMessage(text, false));
        chatInput.value = '';
        messages.scrollTop = messages.scrollHeight;

        showLoading();

        try {
            const response = await fetch('../../controller/cChatbot.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `message=${encodeURIComponent(text)}`
            });

            const result = await response.json();
            hideLoading();

            // Xử lý từng loại phản hồi
            if (result.type === 'greeting') {
                showTypingIndicator();
                await sleep(800);
                hideTypingIndicator();
                messages.appendChild(createMessage(result.message, true));
                return;
            }

            if (result.type === 'suggestion' && result.data.length > 0) {
                showTypingIndicator();
                await sleep(800);
                hideTypingIndicator();
                messages.appendChild(createMessage('Dạ đây là một số món ăn gợi ý:', true));

                for (const product of result.data.slice(0, 3)) {
                    showTypingIndicator();
                    await sleep(800);
                    hideTypingIndicator();

                    const productInfo = `
                        🍽️ <strong>${product.tenMon}</strong><br>
                        💰 <strong>Giá:</strong> ${product.gia}<br>
                        📄 <strong>Thực đơn:</strong> ${product.thucDon}<br>
                        🔗 <a href="monan-detail.php?id=${product.id}" target="_blank">Xem chi tiết</a>
                    `;
                    messages.appendChild(createMessage(productInfo, true));
                }

                return;
            }

            if (result.type === 'result' && result.data.length > 0) {
                showTypingIndicator();
                await sleep(800);
                hideTypingIndicator();
                messages.appendChild(createMessage('Dạ, nhà hàng chúng tôi có các món sau nhé:', true));

                for (const product of result.data.slice(0, 3)) {
                    showTypingIndicator();
                    await sleep(800);
                    hideTypingIndicator();

                    const productInfo = `
                        🍽️ <strong>${product.tenMon}</strong><br>
                        💰 <strong>Giá:</strong> ${product.gia}<br>
                        📄 <strong>Thực đơn:</strong> ${product.thucDon}<br>
                        🔗 <a href="monan-detail.php?id=${product.id}" target="_blank">Xem chi tiết</a>
                    `;
                    messages.appendChild(createMessage(productInfo, true));
                }

                return;
            }

            if (result.type === 'unknown') {
                showTypingIndicator();
                await sleep(800);
                hideTypingIndicator();
                messages.appendChild(createMessage(result.message, true));
                return;
            }

            // Phòng trường hợp khác
            messages.appendChild(createMessage('Xin lỗi, mình chưa hiểu yêu cầu của bạn.', true));

        } catch (error) {
            console.error('Error:', error);
            hideLoading();
            messages.appendChild(createMessage(
                'Đã xảy ra lỗi khi tìm kiếm món ăn. Vui lòng thử lại sau.', true));
        }

        messages.scrollTop = messages.scrollHeight;
    }

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
});
</script>

</div>