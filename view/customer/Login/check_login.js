document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const errorMessage = document.getElementById('error-message');
    const successMessage = document.getElementById('success-message');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Ngăn reload trang

        const sdt = document.getElementById('sdt').value.trim();
        const mk = document.getElementById('mk').value.trim();

        // Xóa thông báo cũ
        errorMessage.innerText = '';
        successMessage.innerText = '';

        if (!sdt || !mk) {
            errorMessage.innerText = 'Vui lòng nhập đầy đủ số điện thoại và mật khẩu!';
            return;
        }

        // Fetch request
        fetch(form.getAttribute('action'), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `sdt=${encodeURIComponent(sdt)}&mk=${encodeURIComponent(mk)}`
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Debug

            if (data.includes('success_admin')) {
                successMessage.innerText = 'Đăng nhập thành công (Admin)! Đang chuyển hướng...';
                setTimeout(() => window.location.href = '../../admin/index.php', 1500);
            } else if (data.includes('success_staff')) {
                successMessage.innerText = 'Đăng nhập thành công (Staff)! Đang chuyển hướng...';
                setTimeout(() => window.location.href = '../../admin/index.php', 1500);
            } else if (data.includes('success_customer')) {
                successMessage.innerText = 'Đăng nhập thành công (Khách hàng)! Đang chuyển hướng...';
                setTimeout(() => window.location.href = '../../index.php', 1500);
            } else {
                errorMessage.innerText = data;
                document.getElementById('mk').value = ''; // Xóa mật khẩu khi lỗi
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            errorMessage.innerText = 'Có lỗi xảy ra, vui lòng thử lại!';
        });
    });
});
