
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

    function createMessage(text, isBot) {
        const wrapper = document.createElement('div');
        wrapper.className = `message-wrapper ${isBot ? 'bot' : 'user'}`;

        const message = document.createElement('div');
message.className = `message ${isBot ? 'bot' : 'user'}`;
        message.textContent = text;

        wrapper.appendChild(message);
        return wrapper;
    }

    function handleSend() {
        const text = chatInput.value.trim();
        if (!text) return;

        // Add user message
        messages.appendChild(createMessage(text, false));
        chatInput.value = '';
        messages.scrollTop = messages.scrollHeight;

        // Show loading
        loading.classList.add('active');

        // Simulate bot response
        setTimeout(() => {
            loading.classList.remove('active');
            messages.appendChild(createMessage("Thanks for your message! I'm a demo bot.", true));
            messages.scrollTop = messages.scrollHeight;
        }, 1000);
    }
