<?php
include_once "../model/Userdaofunction.php";
$username=$_POST['username'];
$password=$_POST['password'];
$res=check_login($username,$password);
if(!$res)
{
    echo "<script>alert('账号或密码错误')</script>";
    echo "<script>window.location.href='../Login.html'</script>";
    die();
}
else
{
    session_start();
    $_SESSION['login']=1;
    echo "<script>alert('登录成功')</script>";
    echo "<script>window.location.href='panindex.php'</script>";
    die();
}

?>


