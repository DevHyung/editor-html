<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$title=$_POST['title'];
$writer=$_POST['writer'];
$contents=$_POST['contents'];

$table_name = "post";
$sql = "
    INSERT INTO $table_name (
        title,
        writer,
        contents
    ) VALUES (
        '$title',
        '$writer',
        '$contents'
    )";
if($result = mysqli_query($db, $sql))
{
    echo "<script>alert('등록되었습니다. ');</script>";
    echo "<script>window.location.replace('../page/user_list.php');</script>";
}
else{
    echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>