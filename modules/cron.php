<?php
//
//Get infomation from POST
$soLuong = 2;
$token = "EAAAAAYsX7TsBAMD1Er1QCOdjVuvxOnKO3LgeEQ7Fr2lOUZC06i9etPzP4ogwLLoFcRNcDlK4t2N2cbQo7TKAYKXrrV5E6WYe1q2U7UhcjW0aKQsszirNrUEFWhfw2m0tWKDLZASOffAr6sX1OmH9zzKbt8BjF3WaNzgQZCF485hgrCLdVBJFyUjXF7BOk2cHRZA1tbmwga4zJmTZBGAJ9";
$camXuc = "LIKE";
//
//
//Setup curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
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
}
?>