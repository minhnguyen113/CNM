<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header('Location: ../customer/login.php');
    exit;
}
$admin_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./guest.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Best Luxurious Hotel Booking Template.">
    <meta name="keywords"
        content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
    <meta name="author" content="ashishmaraviya">

    <title>Chef Restaurent</title>

    <!-- App favicon -->
    <?php
    include('./head-resource-ad.php');
    ?>
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
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
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

        .user-item.active,
        .user-item:hover {
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
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
            .chat-container {
                flex-direction: column;
                min-height: 500px;
            }

            .user-list {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e0e0e0;
            }

            .chat-area {
                padding: 0;
            }

            #chat-with,
            .chat-form {
                padding-left: 12px;
                padding-right: 12px;
            }

            #chat-messages {
                padding-left: 12px;
                padding-right: 12px;
            }
        }
    </style>
</head>

<body data-lh-mode="light">
    <main class="wrapper sb-default">
        <!-- Loader -->
        <div class="lh-loader">
            <span class="loader"></span>
        </div>

        <!-- Header -->
        <header class="lh-header">
            <div class="container-fluid">
                <div class="lh-header-items">
                    <div class="left-header">
                        <a href="javascript:void(0)" class="lh-toggle-sidebar">
                            <span class="outer-ring">
                                <span class="inner-ring"></span>
                            </span>
                        </a>
                        <div class="header-search-box">
                            <div class="header-search-drop">
                                <a href="javascript:void(0)" class="open-search"><i class="ri-search-line"></i></a>
                                <form class="lh-search">
                                    <input class="search-input" type="text" placeholder="Search...">
                                    <a href="javascript:void(0)" class="search-btn"><i class="ri-search-line"></i>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="right-header">
                        <div class="lh-right-tool display-screen">
                            <a class="lh-screen full" href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
                            <a class="lh-screen reset" href="javascript:void(0)">
                                <!-- <i class="ri-fullscreen-exit-line"></i> -->
                                <i class="fa-solid fa-expand"></i>
                            </a>
                        </div>
                        <div class="lh-right-tool">
                            <a class="lh-notify" href="javascript:void(0)">
                                <i class="fa-regular fa-bell"></i>
                                <span class="label"></span>
                            </a>
                        </div>
                        <div class="lh-right-tool display-dark">
                            <a class="lh-mode dark" href="javascript:void(0)"><i class="fa-regular fa-moon"></i></a>
                            <a class="lh-mode light" href="javascript:void(0)"><i class="fa-regular fa-sun"></i></a>
                        </div>
                        <div class="lh-right-tool lh-user-drop">
                            <div class="lh-hover-drop">
                                <div class="lh-hover-tool">
                                    <img class="user" id="user-img" src="<?php echo !empty($data['HinhAnh']) ? '../../assets_admin/img/user/' . htmlspecialchars($data['HinhAnh']) : '../../assets_admin/img/user/minh.jpg'; ?>" alt="user">
                                </div>
                                <div class="lh-hover-drop-panel right">
                                    <div class="details">
                                        <ul class="border-top" style="margin-top:-20px;">
                                            <li><a href="./team-profile.php">Thông tin</a></li>

                                        </ul>
                                        <ul class="border-top">
                                            <li><a href="../customer/login.php"><i class="ri-logout-circle-r-line"></i>Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>

        <!-- sidebar -->
        <div class="lh-sidebar-overlay"></div>
        <div class="lh-sidebar" data-mode="light">
            <div class="lh-sb-logo">
                <a href="./index.php" class="sb-full"><img src="../../assets_admin/img/logo/logo2.png" alt="logo" style="width:326px;text-align:center;margin-left:-60px"></a>
                <a href="./index.php" class="sb-collapse"><img src="../../assets_admin/img/logo/collapse-logo.png" alt="logo"></a>
            </div>
            <div class="lh-sb-wrapper">
                <div class="lh-sb-content">
                    <ul class="lh-sb-list">
                        <li class="lh-sb-item sb-drop-item">
                            <a href="javascript:void(0)" class="lh-drop-toggle">
                                <i class="fa-regular fa-clock"></i>
                                <span class="condense">Bảng Điều Khiển<i class="drop-arrow fa-regular fa-circle-left"></i></span>
                            </a>
                            <ul class="lh-sb-drop condense">
                                <li class="list"><a href="./index.php" class="lh-page-link drop">
                                        <i class="fa-solid fa-code-commit"></i>Report</a></li>
                            </ul>
                        </li>
                        <li class="lh-sb-item-separator"></li>
                        <?php
                        include('./setRole.php');
                        ?>

                    </ul>
                </div>
            </div>

        </div>
        </div>
        <!-- Notify sidebar -->
        <div class="lh-notify-bar-overlay"></div>
        <div class="lh-notify-bar">
            <div class="lh-bar-title">
                <h6>Notifications<span class="label">12</span></h6>
                <a href="javascript:void(0)" class="close-notify"><i class="ri-close-line"></i></a>
            </div>
            <div class="lh-bar-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="alert-tab" data-bs-toggle="tab" data-bs-target="#alert"
                            type="button" role="tab" aria-controls="alert" aria-selected="true">Alert</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                            type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="alert" role="tabpanel" aria-labelledby="alert-tab">
                        <div class="lh-alert-list">
                            <ul>
                                <li>
                                    <div class="icon lh-alert">
                                        <i class="ri-alarm-warning-line"></i>
                                    </div>
                                    <div class="detail">
                                        <div class="title">Your final report is overdue</div>
                                        <p class="time">Just now</p>
                                        <p class="message">Please submit your quarterly report before - June 15.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon lh-warn">
                                        <i class="ri-error-warning-line"></i>
                                    </div>
                                    <div class="detail">
                                        <div class="title">Your Booking campaign is stop!</div>
                                        <p class="time">5:45AM - 25/05/2024</p>
                                        <p class="message">Please submit your quarterly report before Jun 15.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon lh-success">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <div class="detail">
                                        <div class="title">Your payment is successfully processed</div>
                                        <p class="time">9:20PM - 19/06/2024</p>
                                        <p class="message">Check your account wallet. if there is any issue, create
                                            support ticket.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon lh-warn">
                                        <i class="ri-error-warning-line"></i>
                                    </div>
                                    <div class="detail">
                                        <div class="title">Budget threshold exceeded!</div>
                                        <p class="time">4:15AM - 01/04/2024</p>
                                        <p class="message">Budget threshold was exceeded for project "Luxurious" B612
                                            elements.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon lh-warn">
                                        <i class="ri-close-line"></i>
                                    </div>
                                    <div class="detail">
                                        <div class="title">Booking was decline!</div>
                                        <p class="time">4:15AM - 01/04/2024</p>
                                        <p class="message">Your booking "B126" is declined by Theresa Mayeras.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon lh-success">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <div class="detail">
                                        <div class="title">Your payment is successfully processed</div>
                                        <p class="time">9:20PM - 19/06/2024</p>
                                        <p class="message">Check your account wallet. if there is any issue, create
                                            support ticket.</p>
                                    </div>
                                </li>
                                <li class="check"><a class="lh-primary-btn" href="#">View all</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                        <div class="lh-message-list">
                            <ul>
                                <li>
                                    <a href="#" class="reply">Reply</a>
                                    <div class="user">
                                        <img src="../../assets_admin/img/user/9.jpg" alt="user">
                                        <span class="label online"></span>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="name">Boris Whisli</a>
                                        <p class="time">5:30AM, Today</p>
                                        <p class="message">Hello, Room 204 need to be clean.</p>
                                        <span class="download-files">
                                            <span class="download">
                                                <img src="../../assets_admin/img/room/1.png" alt="image">
                                                <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                            </span>
                                            <span class="download">
                                                <img src="../../assets_admin/img/room/2.png" alt="image">
                                                <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                            </span>
                                            <span class="download">
                                                <img src="../../assets_admin/img/room/3.png" alt="image">
                                                <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="reply">Reply</a>
                                    <div class="user">
                                        <img src="../../assets_admin/img/user/8.jpg" alt="user">
                                        <span class="label offline"></span>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="name">Frank N. Stein</a>
                                        <p class="time">8:30PM, 05/12/2024</p>
                                        <p class="message">Please take a look and get order from table 06.</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="reply">Reply</a>
                                    <div class="user">
                                        <img src="../../assets_admin/img/user/7.jpg" alt="user">
                                        <span class="label busy"></span>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="name">Frank N. Stein</a>
                                        <p class="time">8:30PM, 05/12/2024</p>
                                        <p class="message">Room 65 AC repair service is done.</p>
                                        <span class="download-files">
                                            <span class="download">
                                                <img src="../../assets_admin/img/facilities/1.png" alt="image">
                                                <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="reply">Reply</a>
                                    <div class="user">
                                        <img src="../../assets_admin/img/user/6.jpg" alt="user">
                                        <span class="label busy"></span>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="name">Paige Turner</a>
                                        <p class="time">4:30PM, 12/12/2024</p>
                                        <p class="message">Take a Spa trainer interview.</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="reply">Reply</a>
                                    <div class="user">
                                        <img src="../../assets_admin/img/user/5.jpg" alt="user">
                                        <span class="label busy"></span>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="name">Allie Grater</a>
                                        <p class="time">8:30PM, 05/12/2024</p>
                                        <p class="message">Take marketing module task.</p>
                                    </div>
                                </li>
                                <li class="check"><a class="lh-primary-btn" href="#">View all</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main content -->
        <div class="lh-main-content">
            <div class="container-fluid">
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
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
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
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
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
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
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
            </div>
                </div>

            <!-- Footer -->
            <footer>
                <div class="container-fluid">
                    <div class="copyright">
                        <p>
                            <span id="copyright_year"></span>
                            <span style="margin-left: 22px"> Nhóm 24</span>
                        </p>
                    </div>
                </div>
            </footer>

            <!-- Feature tools -->
            <div class="lh-tools-sidebar-overlay"></div>
            <div class="lh-tools-sidebar">
                <a href="javascript:void(0)" class="lh-tools-sidebar-toggle in-out">
                    <i class="fa-solid fa-gear"></i>

                </a>
                <div class="lh-bar-title">
                    <h6>Tools</h6>
                    <a href="javascript:void(0)" class="close-tools"><i class="ri-close-line"></i></a>
                </div>
                <div class="lh-tools-detail">
                    <div class="lh-tools-block">
                        <h3>Modes</h3>
                        <div class="lh-tools-info">
                            <div class="lh-tools-item mode active" data-lh-mode-tool="light">
                                <img src="../../assets_admin/img/tools/light.png" alt="light">
                                <p>light</p>
                            </div>
                            <div class="lh-tools-item mode" data-lh-mode-tool="dark">
                                <img src="../../assets_admin/img/tools/dark.png" alt="dark">
                                <p>dark</p>
                            </div>
                        </div>
                    </div>
                    <div class="lh-tools-block">
                        <h3>Sidebar</h3>
                        <div class="lh-tools-info">
                            <div class="lh-tools-item sidebar active" data-sidebar-mode-tool="light">
                                <img src="../../assets_admin/img/tools/side-light.png" alt="light">
                                <p>light</p>
                            </div>
                            <div class="lh-tools-item sidebar" data-sidebar-mode-tool="dark">
                                <img src="../../assets_admin/img/tools/side-dark.png" alt="dark">
                                <p>dark</p>
                            </div>
                            <div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-1">
                                <img src="../../assets_admin/img/tools/side-bg-1.png" alt="background">
                                <p>Bg-1</p>
                            </div>
                            <div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-2">
                                <img src="../../assets_admin/img/tools/side-bg-2.png" alt="background">
                                <p>Bg-2</p>
                            </div>
                            <div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-3">
                                <img src="../../assets_admin/img/tools/side-bg-3.png" alt="background">
                                <p>Bg-3</p>
                            </div>
                            <div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-4">
                                <img src="../../assets_admin/img/tools/side-bg-4.png" alt="background">
                                <p>Bg-4</p>
                            </div>
                        </div>
                    </div>
                    <div class="lh-tools-block">
                        <h3>Header</h3>
                        <div class="lh-tools-info">
                            <div class="lh-tools-item header active" data-header-mode="light">
                                <img src="../../assets_admin/img/tools/header-light.png" alt="light">
                                <p>light</p>
                            </div>
                            <div class="lh-tools-item header" data-header-mode="dark">
                                <img src="../../assets_admin/img/tools/header-dark.png" alt="dark">
                                <p>dark</p>
                            </div>
                        </div>
                    </div>
                    <div class="lh-tools-block">
                        <h3>Backgrounds</h3>
                        <div class="lh-tools-info">
                            <div class="lh-tools-item bg active" data-bg-mode="default">
                                <img src="../../assets_admin/img/tools/bg-0.png" alt="default">
                                <p>Default</p>
                            </div>
                            <div class="lh-tools-item bg" data-bg-mode="bg-1">
                                <img src="../../assets_admin/img/tools/bg-1.png" alt="bg-1">
                                <p>Bg-1</p>
                            </div>
                            <div class="lh-tools-item bg" data-bg-mode="bg-2">
                                <img src="../../assets_admin/img/tools/bg-2.png" alt="bg-2">
                                <p>Bg-2</p>
                            </div>
                            <div class="lh-tools-item bg" data-bg-mode="bg-3">
                                <img src="../../assets_admin/img/tools/bg-3.png" alt="bg-3">
                                <p>Bg-3</p>
                            </div>
                            <div class="lh-tools-item bg" data-bg-mode="bg-4">
                                <img src="../../assets_admin/img/tools/bg-4.png" alt="bg-4">
                                <p>Bg-4</p>
                            </div>
                            <div class="lh-tools-item bg" data-bg-mode="bg-5">
                                <img src="../../assets_admin/img/tools/bg-5.png" alt="bg-5">
                                <p>Bg-5</p>
                            </div>
                        </div>
                    </div>
                    <div class="lh-tools-block">
                        <h3>Box Design</h3>
                        <div class="lh-tools-info">
                            <div class="lh-tools-item box active" data-box-mode-tool="default">
                                <img src="../../assets_admin/img/tools/box-0.png" alt="default">
                                <p>Default</p>
                            </div>
                            <div class="lh-tools-item box" data-box-mode-tool="box-1">
                                <img src="../../assets_admin/img/tools/box-1.png" alt="box-1">
                                <p>Box-1</p>
                            </div>
                            <div class="lh-tools-item box" data-box-mode-tool="box-2">
                                <img src="../../assets_admin/img/tools/box-2.png" alt="box-2">
                                <p>Box-2</p>
                            </div>
                            <div class="lh-tools-item box" data-box-mode-tool="box-3">
                                <img src="../../assets_admin/img/tools/box-3.png" alt="box-3">
                                <p>Box-3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php
    include('../customer/chatbot.php');
    include('./footer-scripts-ad.php');
    ?>


</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./guest.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

</html>