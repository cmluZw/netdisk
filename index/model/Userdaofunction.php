<?php



function check_login($username,$password)
{
    include_once "config.php";
    $sql="SELECT password FROM user WHERE username ='$username'";
    $result=mysqli_query($conn,$sql);
    @$row = mysqli_fetch_array($result);
    if(!$row)
    {
//        die("check_login函数错误");
        return false;
    }
    if($row[0]!=$password)
    {
        return false;
    }
    return true;
}


function update_passwd($email,$newpasswd)
{
    include("config.php");
    $sql="update user set password='$newpasswd' where email='$email'";
    if(!mysqli_query($conn,$sql))
    {
//        die("error in function update_passwd() ");
        return false;
    }
    return true;
}


function check_email($email)
{
    include("config.php");
    $sql="SELECT email FROM user WHERE email ='$email'";
    $result=mysqli_query($conn,$sql);
    @$row = mysqli_fetch_array($result);
    if(!$row[0])
    {
//        die("error in function check_email() ");
        return false;
    }
    return true;

}
?>