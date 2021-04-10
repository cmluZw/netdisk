
	
	<?php
	function waf($x)
{
    if(eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $x))
    {
           echo "<script>alert('非法输入')</script>";
    echo "<script>window.location.href='index.html'</script>";
    die();
    }
    else
    {
        $x=addslashes($x);
        $x=htmlspecialchars($x);
        return $x;
    }
}
?>