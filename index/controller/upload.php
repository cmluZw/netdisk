<?php
header("Content-type: text/html;charset=utf8");
session_start();
if(!$_SESSION['login'])
{
    echo "<script>alert('请先登录')</script>";
    echo "<script>window.location.href='../Login.html'</script>";
    die();
}
include_once "../model/Filedaofunction.php";
if ($_FILES["file"]["error"] > 0)
{
//    echo "错误：" . $_FILES["file"]["error"] . "<br>";
    echo "<script>alert('上传失败')</script>";
    echo "<script>window.location.href='panindex.php'</script>";
    die();

}
else
{
    $path='/upload/';   //这个在根目录下
    if(!file_exists($path))
    {
        mkdir($path);
    }
    $filename= $_FILES["file"]["name"];
    $type= $_FILES["file"]["type"] ;
    $size= ($_FILES["file"]["size"] / 1024)."kB";
    $tmp_name= $_FILES["file"]["tmp_name"];
    $uploadfile=$path.$filename;
    $flag=move_uploaded_file($tmp_name,$uploadfile);
    if(!$flag)
    {
        echo "<script>alert('上传失败')</script>";
        echo "<script>window.location.href='panindex.php'</script>";
        die();
    }

        $upload_time=date("Y-m-d H:i",time());
        $res=upload_file($filename,$path,$upload_time,$size,$type);
        if(!$res)
        {
            echo "<script>alert('写入数据库失败')</script>";
            echo "<script>window.location.href='panindex.php'</script>";
            die();
        }
        echo "<script>alert('上传成功')</script>";
        echo "<script>window.location.href='panindex.php'</script>";


}
?>