<?php
include_once(__DIR__ . "../model/mRole.php");


class RoleController
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }

    // Lấy danh sách tất cả vai trò
    public function listRoles()
    {
        $allRoles = $this->roleModel->getAllRoles();
        if ($allRoles === null) {
            return [];
        }
        return array_filter($allRoles, fn($role) => in_array($role['TenViTri'], ['staff', 'admin']));
    }
    

    // Lấy thông tin vai trò theo ID
    public function getRoleDetails($role_id)
    {
        return $this->roleModel->getRoleById($role_id);
    }

    // Thêm vai trò mới
    public function createRole($role_name, $description)
    {
        if (empty($role_name)) {
            return "Role name cannot be empty!";
        }

        $success = $this->roleModel->addRole($role_name, $description);
        return $success ? "Role added successfully!" : "Failed to add role.";
    }

    // Cập nhật vai trò
    public function editRole($role_id, $role_name, $description)
    {
        if (empty($role_name)) {
            return "Role name cannot be empty!";
        }

        $success = $this->roleModel->updateRole($role_id, $role_name, $description);
        return $success ? "Role updated successfully!" : "Failed to update role.";
    }

    // Xóa vai trò
    public function deleteRole($role_id)
    {
        $success = $this->roleModel->deleteRole($role_id);
        return $success ? "Role deleted successfully!" : "Failed to delete role.";
    }
}
?>