<?php


include_once(__DIR__ . "/Connect.php");


class MenuModel
{
    private $conn;

    public function __construct()
    {
        $db = new ketnoi();
        $this->conn = $db->Moketnoi();
    }

    // hien thi danh sach mon an
    public function getAllMenu()
    {
        $sql = "SELECT * FROM MonAn";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // hien thi danh sach thuc don

    public function getMonAnByThucDon($id_thuc_don)
    {
        $sql = "SELECT * FROM MonAn WHERE ID_ThucDon = '$id_thuc_don'";
        $result = mysqli_query($this->conn, $sql);
        $monAnList = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $monAnList[] = $row;
        }
    
        return $monAnList;
    }
    

    public function addMenu($name, $price)
    {
        $sql = "INSERT INTO Menu (TenMonAn, Gia) VALUES ('$name', '$price')";
        return mysqli_query($this->conn, $sql);
    }

    public function updateMenu($id, $name, $price)
    {
        $sql = "UPDATE Menu SET TenMonAn = '$name', Gia = '$price' WHERE ID_Menu = '$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteMenu($id)
    {
        $sql = "DELETE FROM Menu WHERE ID_Menu = '$id'";
        return mysqli_query($this->conn, $sql);
    }
}




?>