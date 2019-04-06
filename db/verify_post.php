<?php
require_once("./dbconfig.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$idx=$_GET['idx'];
$table_name = "post";
$sql  = "
    UPDATE $table_name
    SET
    isVerify = 'y'
    WHERE idx = '$idx';
    ";

if($result = mysqli_query($db, $sql))
{
	echo "<script>window.close();</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
