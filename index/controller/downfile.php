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
header("Content-type: text/html;charset=utf8");
$filename = $_POST['filename'];
$filepath=findpathbyname($filename);
$filename=$filepath.$filename;
//echo $filename;
if(!file_exists($filename))
{
    echo "<script>alert('文件不存在')</script>";
    echo "<script>window.location.href='panindex.php'</script>";
    die();
}
$content=preg_match("/\.\.\//",$filename,$arr);
//var_dump($content);
if($content)
{
    echo "<script>alert('非法文件上传！')</script>";
    echo "<script>window.location.href='panindex.php'</script>";
    die();
}
$file = str_replace("..", "", $filename);
header('content-disposition:attachment;filename='.basename($filename));
header('content-length:'.filesize($filename));
readfile($filename);
echo "<script>window.location.href='panindex.php'</script>";
die();