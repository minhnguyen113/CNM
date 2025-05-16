<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header('Location: ../customer/login.php');
    exit;
}
$admin_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Chat</title>
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .chat-container {
            display: flex;
            max-width: 950px;
            margin: 40px auto;
            border: 1px solid #e0e0e0;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            background: #fff;
            min-height: 600px;
            overflow: hidden;
        }
        .user-list {
            width: 270px;
            border-right: 1px solid #e0e0e0;
            padding: 0;
            background: #f7fafc;
            display: flex;
            flex-direction: column;
        }
        .user-list b {
            padding: 20px 20px 10px 20px;
            font-size: 1.1em;
        }
        #customer-list {
            flex: 1;
            overflow-y: auto;
        }
        .user-item {
            padding: 16px 20px;
            cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.2s;
            font-size: 1.05em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-item.active, .user-item:hover {
            background: #e3f2fd;
            font-weight: bold;
        }
        .unread {
            color: #e53935;
            font-weight: bold;
            font-size: 0.95em;
        }
        .chat-area {
            flex: 1;
            padding: 0 0 0 0;
            display: flex;
            flex-direction: column;
            background: #f9fbfd;
        }
        #chat-with {
            margin: 0;
            padding: 24px 32px 10px 32px;
            font-size: 1.25em;
            font-weight: 600;
            color: #1976d2;
        }
        #chat-messages {
            flex: 1;
            min-height: 200px;
            max-height: 420px;
            overflow-y: auto;
            padding: 0 32px 0 32px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }
        .msg {
            margin: 8px 0;
            padding: 10px 18px;
            border-radius: 18px;
            max-width: 60%;
            word-break: break-word;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            font-size: 1em;
            position: relative;
        }
        .msg.me {
            align-self: flex-end;
            background: linear-gradient(90deg, #1976d2 60%, #42a5f5 100%);
            color: #fff;
            border-bottom-right-radius: 4px;
        }
        .msg.other {
            align-self: flex-start;
            background: #e3f2fd;
            color: #222;
            border-bottom-left-radius: 4px;
        }
        .msg .sender {
            font-weight: 600;
            font-size: 0.97em;
            margin-right: 8px;
        }
        .msg .time {
            font-size: 0.85em;
            color: #888;
            margin-left: 8px;
        }
        .chat-form {
            display: flex;
            gap: 10px;
            padding: 18px 32px 24px 32px;
            background: #fff;
            border-top: 1px solid #e0e0e0;
        }
        .chat-form input[type=text] {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #bdbdbd;
            border-radius: 22px;
            font-size: 1em;
            outline: none;
            background: #f7fafc;
            transition: border 0.2s;
        }
        .chat-form input[type=text]:focus {
            border: 1.5px solid #1976d2;
            background: #fff;
        }
        .chat-form button {
            padding: 0 28px;
            background: linear-gradient(90deg, #1976d2 60%, #42a5f5 100%);
            color: #fff;
            border: none;
            border-radius: 22px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.08);
        }
        .chat-form button:hover {
            background: linear-gradient(90deg, #1565c0 60%, #1976d2 100%);
        }
        @media (max-width: 700px) {
            .chat-container { flex-direction: column; min-height: 500px; }
            .user-list { width: 100%; border-right: none; border-bottom: 1px solid #e0e0e0; }
            .chat-area { padding: 0; }
            #chat-with, .chat-form { padding-left: 12px; padding-right: 12px; }
            #chat-messages { padding-left: 12px; padding-right: 12px; }
        }
    </style>
</head>
<body>
<div class="chat-container">
    <div class="user-list" id="user-list">
        <b>Khách hàng đã chat</b>
        <div id="customer-list"></div>
    </div>
    <div class="chat-area">
        <h3 id="chat-with">Chọn khách hàng để chat</h3>
        <div id="chat-messages"></div>
        <form id="chat-form" class="chat-form" style="display:none" autocomplete="off">
            <input type="hidden" id="other_id" value="">
            <input type="text" id="message" placeholder="Nhập tin nhắn..." required>
            <button type="submit">Gửi</button>
        </form>
    </div>
</div>
<script>
let currentCustomer = null;

function loadCustomerList() {
    fetch('../customer/chat_api.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=list_customers'
    })
    .then(res => res.json())
    .then(list => {
        let html = '';
        list.forEach(cus => {
            html += `<div class="user-item${currentCustomer == cus.ID_User ? ' active' : ''}" 
                        onclick="selectCustomer(${cus.ID_User}, '${cus.TenUser.replace(/'/g, "\\'")}')">
                        ${cus.TenUser}
                        ${cus.unread > 0 ? `<span class="unread"> (${cus.unread})</span>` : ''}
                    </div>`;
        });
        document.getElementById('customer-list').innerHTML = html;
    });
}

function selectCustomer(id, name) {
    currentCustomer = id;
    document.getElementById('other_id').value = id;
    document.getElementById('chat-with').innerText = 'Chat với: ' + name;
    document.getElementById('chat-form').style.display = '';
    fetchMessages();
}

function fetchMessages() {
    if (!currentCustomer) return;
    fetch('../customer/chat_api.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=fetch&other_id=' + currentCustomer
    })
    .then(res => res.json())
    .then(messages => {
        let html = '';
        messages.forEach(msg => {
            html += `<div class="msg ${msg.sender_id == <?= $admin_id ?> ? 'me' : 'other'}">
                <span class="sender">${msg.sender_name}:</span>
                ${msg.message}
                <span class="time">(${msg.created_at})</span>
            </div>`;
        });
        document.getElementById('chat-messages').innerHTML = html;
        document.getElementById('chat-messages').scrollTop = 99999;
    });
}

document.getElementById('chat-form').onsubmit = function(e) {
    e.preventDefault();
    const msg = document.getElementById('message').value;
    const other_id = document.getElementById('other_id').value;
    if (!msg.trim() || !other_id) return;
    fetch('../customer/chat_api.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=send&other_id=' + other_id + '&message=' + encodeURIComponent(msg)
    }).then(() => {
        document.getElementById('message').value = '';
        fetchMessages();
        loadCustomerList();
    });
};

setInterval(() => {
    loadCustomerList();
    fetchMessages();
}, 1000);

loadCustomerList();
</script>
</body>
</html>