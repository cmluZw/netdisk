<?php
@header("Content-type:text/html;charset=utf-8");
$dbuser ='root';
$dbpass ='123456789';
$dbname ="tools";
$host ='127.0.0.1';

$conn=mysqli_connect($host,$dbuser,$dbpass,$dbname);
$conn->query("set names utf8");
if(!$conn)
{
die("数据库连接失败");
}