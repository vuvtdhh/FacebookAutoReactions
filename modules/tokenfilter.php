<?php
ini_set('precision',20);
include "connect.php";
include "save.php";
$con = connect();
//
$username = isset($_POST["username"]) ? $_POST["username"] : false;
$token = isset($_POST["token"]) ? $_POST["token"] : false;
save($con, $username, "", $token);
$result =
'<div class="form-group">
    <label for="filterResult">Token:</label>
	<textarea readonly id="filterResult" type="text" class="form-control" rows="5" placeholder="Token">'.$token.'</textarea>
</div>';
echo $result;
?>