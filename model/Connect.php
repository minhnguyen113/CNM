<?php


class ketnoi
{

    public function Moketnoi()
    {
        $conn = mysqli_connect("localhost", "root", "");
        if (!$conn) {
            echo ' loi ket noi CSDL';
            exit();
        } else {
            mysqli_select_db($conn, "NhaHang");
            mysqli_query($conn, "SET NAMES UTF8");

            return $conn;
        }
    }




    public function Dongketnoi($conn)
    {
        mysqli_close($conn);
    }
}



        // Test thử
        $database = new ketnoi();
        $conn = $database->Moketnoi();

        if ($conn) {
            echo "✅ Kết nối CSDL thành công!";
            $database->Dongketnoi($conn);
        } else {
            echo "❌ Kết nối CSDL thất bại!";
        }

?>
