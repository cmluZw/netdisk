<?php

function find_all_file()
{
    include_once "config.php";
    $sql="SELECT * FROM file";
    $result=mysqli_query($conn,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
        $result_arr[$i]= $row;
        $i++;
    }
    return $result_arr;
}

function findpathbyname($filename)
{
    include_once "config.php";
    $sql="SELECT filepath FROM file WHERE filename ='$filename'";
    $result=mysqli_query($conn,$sql);
    @$row = mysqli_fetch_array($result);
    if(!$row)
    {
//        die("findpathbyname函数错误");
        return false;
    }
    return $row[0];
}

function upload_file($filename,$filepath,$upload_time,$size,$file_type)
{
    include_once "config.php";
    $sql="insert into file (filename,filepath,upload_time,size,filetype) values ('$filename','$filepath','$upload_time','$size','$file_type')";
//    echo $sql;
    if(!mysqli_query($conn,$sql))
    {
        return false;
    }
    return true;
}

function searchfilebyname($filename)
{
    include("config.php");
    $sql = "select * from file where filename like '%$filename%'";
    $result = mysqli_query($conn, $sql);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $result_arr[$i] = $row;
        $i++;
    }
    return $result_arr;
}