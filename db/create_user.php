<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$userId=$_POST['id'];
$userPw=$_POST['pw'];
$userName=$_POST['name'];


$table_name = "user";
$sql  = "
    INSERT INTO $table_name (
        id,
        pw,
        name,
        createDateTime
    ) VALUES (
        '$userId',
        '$userPw',
        '$userName',
        NOW()
    )";
if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('등록되었습니다. ');</script>";
	echo "<script>window.location.replace('../main.php');</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
