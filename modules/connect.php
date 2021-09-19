<?php
function connect(){
    $con = mysqli_connect("localhost", "id3210825_admin", "huyvu0208", "id3210825_database");
    mysqli_set_charset($con,"utf8");
    if(!$con){
        //exit("Kết nối thất bại! ".mysqli_connect_error());
    }else{
        //echo "Kết nối thành công!";
        return $con;
    }
}
?>