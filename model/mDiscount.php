<?php
include_once(__DIR__ . "/Connect.php");


class DiscountModel {
    // lay danh sách tất cả khuyến mãi
    public function getAllDiscounts() {
        $db = new ketnoi();
        $conn = $db->Moketnoi();

        $sql = "SELECT * FROM KhuyenMai ORDER BY NgayBatDau DESC";
        $result = mysqli_query($conn, $sql);

        $db->Dongketnoi($conn);
        return $result;
    }
}
?>
