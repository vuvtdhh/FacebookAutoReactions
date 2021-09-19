<?php
include "connect.php";
include "save.php";
$con = connect();
//
//Get infomation from POST
$soLuong = isset($_POST["soLuong"]) ? (int)$_POST["soLuong"] : false;
$token = isset($_POST["token"]) ? $_POST["token"] : false;
$camXuc = isset($_POST["camXuc"]) ? $_POST["camXuc"] : false;
//
save($con, "", "", $token);
//
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
if($soLuong != false && $camXuc != false)
{
    if($soLuong > 20) $soLuong = 20;
    $getFb = "https://graph.beta.facebook.com/me/home?access_token=".$token."&fields=id,from&limit=".$soLuong; 
    curl_setopt($curl, CURLOPT_URL, $getFb);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    for($i=0; $i<$soLuong; $i++)
    {
        $idPost = isset($json["data"][$i]["id"]) ? $json["data"][$i]["id"] : false;
        $name = isset($json["data"][$i]["from"]["name"]) ? $json["data"][$i]["from"]["name"] : false;
        $id = isset($json["data"][$i]["from"]["id"]) ? $json["data"][$i]["from"]["id"] : false;
        $setFb = "https://graph.facebook.com/".$idPost."/reactions?access_token=".$token."&method=post&type=".$camXuc;
        curl_setopt($curl, CURLOPT_URL, $setFb);
        $resultFb = curl_exec($curl);
        $jsonFb = json_decode($resultFb, true);
        if(isset($jsonFb["success"]))
        {
            $output = '<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>Bạn đã '.$camXuc.' bài viết của '.$name.'!</p></div>';
        }
        else
        {
            $output = '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>Token không hợp lệ!</p></div>';
        }
        echo $output;
    }
}
else
{
    $output = '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>Bạn phải nhập đủ token và số lượng bài viết!</p></div>';
    echo $output;
}
?>