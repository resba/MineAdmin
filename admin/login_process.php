<?php
session_start();
require_once('config.php');

if($useflatfile)
{
    require("flatfile.class.php");
    $db = new Flatfile($flatfile['HOST'], $flatfile['USER'], $flatfile['PASS'], $flatfile['DB']);
}
else
{
    require("mysql.class.php");
    $db = new MySQL($mysql['HOST'], $mysql['USER'], $mysql['PASS'], $mysql['DB']);
}

$user=$_POST['user'];
$result=$db->fetch_by("users",Array("password"=>sha1($_POST['pass']),"name"=>$user),"");
if($result['password'] == sha1($_POST['pass'])) {
        $_SESSION['user']=$user;
        echo "1";
}else{
        echo "0";
}
?>