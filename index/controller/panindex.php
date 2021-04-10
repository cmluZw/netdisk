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
$file=find_all_file();

?>
<html>
<head>
    <link href="../style/panindex.css" rel="stylesheet">
</head>
<body>
<h4>搜索文件</h4>
<div class="search">
<form action="search.php" method="post" enctype="multipart/form-data">
    <div class="search_input">
        <input type="text" name="search_name"></div>
       <div class="search_button">
        <button type="submit" class="search_button">搜索</button></div>

</form>
</div>

<h4>文件目录</h4>
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

<div class="upload">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="avatar">
            <label for="file">点击上传文件</label>
            <input type="file" name="file" id="file">
        </div>
        <div>
            <input class="upload_button" type="submit" name="submit" value="提交">
        </div>
    </form>
</div>
</body>
</html>





