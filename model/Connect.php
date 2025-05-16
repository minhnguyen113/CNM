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
            mysqli_select_db($conn, "nhahang1");
            mysqli_query($conn, "SET NAMES UTF8");

            return $conn;
        }
    }




    public function Dongketnoi($conn)
    {
        mysqli_close($conn);
    }
}



       
?>
