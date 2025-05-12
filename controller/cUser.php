<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once(__DIR__ . "/../model/mUser.php");


class UserController
{
    private $userModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
    }


    //signup
   // Hàm xử lý đăng ký tài khoản khách hàng
public function signup($username, $email, $phone, $address, $dob, $password)
{
    // Mặc định role là 3 - Customer
    $idrole = 3;
    $avatar = ''; // bạn có thể thêm xử lý upload sau

    // Mã hóa mật khẩu
    $passwordHashed = md5($password);

    $result = $this->userModel->addCustomer($username, $email, $phone, $address, $dob, $avatar, $passwordHashed);
    
    if ($result) {
        $_SESSION['success'] = "Đăng ký thành công. Mời bạn đăng nhập!";
        header("Location: ../loginlogout/login.php");
        exit;
    } else {
        $_SESSION['error'] = "Đăng ký thất bại. Vui lòng thử lại.";
        header("Location: ../loginlogout/signup.php");
        exit;
    }
}

    
  
    
    


    // login
    public function handleLogin($sdt, $password)
    {
        $passwordHashed = md5($password);

        // Check User
        $user = $this->userModel->checkUserLogin($sdt, $passwordHashed);

        if ($user) {
            $_SESSION['user_id'] = $user['ID_User'];
            $_SESSION['username'] = $user['TenUser'];
            $_SESSION['email'] = $user['Email'];
            $_SESSION['role_id'] = $user['ID_Role'];
            $_SESSION['role_name'] = 'User'; // hoặc lấy từ bảng role
            $_SESSION['phone'] = $user['SoDienThoai'];

            $this->userModel->updateCheckIn($user['ID_User']);


            // Phân quyền chính xác
            if ($user['ID_Role'] == 1) {
                $_SESSION['success'] = 'Chào mừng Quản lý';
                header("Location: ../admin/index.php");
                exit;
            } elseif ($user['ID_Role'] == 2) {
                $_SESSION['success'] = 'Chào mừng Nhân viên';
                header("Location: ../admin/index.php");
                exit;
            } elseif ($user['ID_Role'] == 3) {
                header("Location: ../customer/index.php");
                exit;
            } else {
                // Nếu role không hợp lệ (phòng ngừa)
                $_SESSION['error'] = 'Tài khoản không hợp lệ! Vui lòng kiểm tra đăng nhập.';
                header("Location: ../customer/login.php");
                exit;
            }
        } else {
            // ✅ Đây mới là chỗ xử lý tài khoản hoặc mật khẩu sai
            $_SESSION['error'] = "Số điện thoại hoặc mật khẩu không đúng!";
            header("Location: ../customer/login.php");
            exit;
        }
    }

    // Lấy danh sách tất cả nhân viên
    public function StaffGetAllUsers($data)
    {
        $model = new UserModel();
        return $model->getAllUsers();
    }

    // Lấy  thong tin chi tiết một nhân viên

    public function StaffGetUserById($iduser)
    {
        $model = new UserModel();
        $staff =  $model->getUserById($iduser);
        return (mysqli_num_rows($staff) > 0) ? $staff : false;
    }
    // Cập nhật thông tin nhân viên, khách hàng
    public function StaffUpdateUserById($id, $email, $phone, $address, $date, $avatarFileName)
    {
        $model = new UserModel();
        return $model->updateUserById($id, $email, $phone, $address, $date, $avatarFileName);
    }

    //thêm mới một nhân viên
    public function StaffAddUser($username, $email, $phone, $address, $date, $avatarFileName, $password, $idrole)
    {
        $model = new UserModel();
        return $model->addUser($username, $email, $phone, $address, $date, $avatarFileName, $password, $idrole);
    }

    // Xóa nhân viên
    
    public function StaffDeleteUser($iduser)
    {
        $model = new UserModel();
        return $model->deleteUser($iduser);
    }

    // Lấy danh sách tất cả khách hàng
    public function StaffGetAllCustomers()
    {
        $model = new UserModel();
        return $model->getAllCustomers();
    }

    //them khách hàng
    public function StaffAddCustomer($username, $email, $phone, $address, $date, $avatarFileName, $password)
    {
        $model = new UserModel();
        return $model->addCustomer($username, $email, $phone, $address, $date, $avatarFileName, $password);
    }


    //Xoá khách hàng
    public function StaffDeleteCustomer($iduser)
    {
        $model = new UserModel();
        return $model->deleteCustomer($iduser);
    }

    // xem chi tiết khách hàng
    public function StaffGetCustomerById($iduser)
    {
        $model = new UserModel();
        $customer =  $model->getCustomerById($iduser);
        return (mysqli_num_rows($customer) > 0) ? $customer : false;
    }
}
