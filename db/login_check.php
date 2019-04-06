<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$userId=$_POST['id'];
$userPw=$_POST['pw'];
$table_name = "user";
$sql = "SELECT * FROM $table_name WHERE id='$userId'";
// 
if($result = mysqli_query($db, $sql))
{
	if(mysqli_num_rows($result) == 0)
	{
		echo "<script>alert('No matched ID.');</script>";
		echo "<script>window.location.replace('../index.html');</script>";
	}
	else
	{
		$row = mysqli_fetch_assoc($result);
		if($row["pw"] == $userPw) // 로그인 성공
		{
			$_SESSION['auth'] = $row['name'];
			$tmp = $row['name'];
			echo "<script>alert('$tmp 작가님 환영합니다.');</script>";
			echo "<script>window.location.replace('../main.php');</script>";
		}
		else
		{
			echo "<script>alert('Wrong Password.');</script>";
			echo "<script>window.location.replace('../index.html');</script>";
		}
	}
}
mysqli_free_result($result);
mysqli_close($db);
?>