<?php
include_once "../model/Userdaofunction.php";
include_once "../model/email/Useremail.php";
$email=$_POST['email'];
//$email="1551505032@qq.com";
$check=check_email($email);
if(!$check)
{
    echo "<script>alert('邮箱不存在')</script>";
    echo "<script>window.location.href='../Login.html'</script>";
    die();
}
//echo "邮箱存在";
@$newpasswd=hash(md5,time());
//echo $newpasswd;
$res=update_passwd($email,$newpasswd);
if(!$res)
{
    echo "<script>alert('邮箱发送失败')</script>";
    echo "<script>window.location.href='../Login.html'</script>";
    die();
}
$content='您正在执行找回密码操作，请勿将密码泄露，如果非您本人操作，请忽视
————————
您的密码为：'.$newpasswd.'
';

@$flag = sendMail($email,'找回密码',$content);
if(!$flag){
    echo "<script>alert('邮箱发送失败')</script>";
    echo "<script>window.location.href='../Login.html'</script>";
    die();
}
echo "<script>alert('密码已发送至邮箱，请查收')</script>";
echo "<script>window.location.href='../Login.html'</script>";
?>