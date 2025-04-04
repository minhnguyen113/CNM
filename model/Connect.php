<?php


    class ketnoi{

        public function Moketnoi(){
            $conn = mysqli_connect("localhost","cnmoi","123456");
            if(!$conn){
                echo ' loi ket noi CSDL';
                exit();
            }else{
                mysqli_select_db($conn,"NhaHang");
                mysqli_query($conn,"SET NAMES UTF8");
                return $conn;

            }
        }

        public function Dongketnoi($conn){
            mysqli_close($conn);
        }
    }










?>