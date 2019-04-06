<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$table_name = "post";
$sql = "
    SELECT NOW();
    ";

$time = $query($sql);

if($result ! mysqli_query($db, $sql))
{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>