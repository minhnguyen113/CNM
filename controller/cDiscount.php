<?php
include_once(__DIR__ . "/../model/mDiscount.php");


class DiscountController {
    // lay danh sách tất cả khuyến mãi
    public function getAllDiscounts() {
        $model = new DiscountModel();
        return $model->getAllDiscounts();
    }
}







?>