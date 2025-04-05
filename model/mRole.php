<?php

    include_once('./Connect.php');

    class RoleModel extends ketnoi{
        

        //Lấy tất cả vai trò
        public function getAllRoles(){

            // ket noi co so du lieu
            $db = new ketnoi();
            $conn = $db->MoKetNoi();

            if(!$conn){
                die("Kết nối cơ sở dữ liệu thất bại.");
            }

            // Câu lệnh SQL để chỉ lấy các vai trò admin và staff
            $sql = "SELECT ID_role, TenViTri FROM VaiTro where  TenViTri IN ('staff', 'admin')";

            // Thực hiện truy vấn
            $result = $conn->query($sql);

            // Kiểm tra kết quả
            if(!$result){
                die("Lỗi truy vấn SQL: " . $conn->error);
            }

            // Lưu kết quả vào mảng
            $roles = [];
            while($row = $result->fetch_assoc()){
                $roles[] = $row;
            }

            // Đóng kết nối

            $db->DongKetNoi($conn);

        }

        // Lấy thông tin chi tiết vai trò theo ID
        public function getRoleById($role_id)
    {
        $db = new ketnoi();
        $con = $db->MoKetNoi();

        $stmt = $con->prepare("SELECT ID_Role, TenViTri, description FROM VaiTro WHERE ID_Role = ?");
        $stmt->bind_param("i", $role_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $role = $result->fetch_assoc();

        $stmt->close();
        $db->DongKetNoi($con);

        return $role;
    }

    // Thêm vai trò mới
    public function addRole($role_name, $description)
    {
        $db = new ketnoi();
        $con = $db->MoKetNoi();

        $stmt = $con->prepare("INSERT INTO VaiTro (TenViTri, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $role_name, $description);
        $success = $stmt->execute();

        $stmt->close();
        $db->DongKetNoi($con);

        return $success;
    }

    // Cập nhật vai trò
    public function updateRole($role_id, $role_name, $description)
    {
        $db = new ketnoi();
        $con = $db->MoKetNoi();

        $stmt = $con->prepare("UPDATE VaiTro SET TenViTri = ?, description = ? WHERE ID_Role = ?");
        $stmt->bind_param("ssi", $role_name, $description, $role_id);
        $success = $stmt->execute();

        $stmt->close();
        $db->DongKetNoi($con);

        return $success;
    }

    // Xóa vai trò
    public function deleteRole($role_id)
    {
        $db = new ketnoi();
        $con = $db->MoKetNoi();

        $stmt = $con->prepare("DELETE FROM VaiTro WHERE ID_Role = ?");
        $stmt->bind_param("i", $role_id);
        $success = $stmt->execute();

        $stmt->close();
        $db->DongKetNoi($con);

        return $success;
    }


    }






?>