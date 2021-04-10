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
$search_name=$_POST['search_name'];
if(!$search_name)
{
    echo "请输入搜索的文件名";
    die();
}
$filename_arr=searchfilebyname($search_name);
if(!$filename_arr)
{
    echo "没有找到您要查找的文件";
    echo "<script>window.location.href='panindex.php'</script>";
    die();
}
else
{
    $file=$filename_arr;
}
?>

<html>
<head>
    <link href="../style/panindex.css" rel="stylesheet">
</head>
<body>
<div class="file_box">
<ul id="ul1" class="Ul">文件名
  <?php
  foreach ($file as $i)
  {
  echo '<li>'.$i["filename"].'</li>';
  }
  ?>
</ul>
<ul id="ul2" class="Ul">上传时间
    <?php
    foreach ($file as $i)
    {
        echo '<li>'.$i["upload_time"].'</li>';
    }
    ?>
</ul>
<ul id="ul3" class="Ul">操作
    <?php
    foreach ($file as $i)
    {
        $filename=$i['filename'];
        echo '<li>
<form action="downfile.php" method="post">
<input type="hidden" value="'.$filename.'" name="filename">
<button class="down_button">下载</button>
</form>
</li>';
    }
    ?>
</ul>
</div>
</body>
</html>