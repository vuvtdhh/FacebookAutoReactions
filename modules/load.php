<?php
include "connect.php";
include "save.php";
$con = connect();
$call = isset($_POST["call"]) ? $_POST["call"] : false;
//
//handle
if($call == "autoLike"){
    echo file_get_contents("../pages/autolike.php");
}
else if($call == "getToken"){
    echo file_get_contents("../pages/gettoken.php");
}
else if($call == "vipAuto"){
    echo file_get_contents("../pages/vipauto.php");
}
?>