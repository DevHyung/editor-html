<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$table_name = "user";
$sql = "SELECT * FROM $table_name WHERE id='$userId'";

if($result = mysqli_query($db, $sql))
{
    if ($title == $result["title"])
    {
        echo "<h1 class="post-title">$title</h1>"
    }

    if($writer = mysqli_query($db, $sql))
    {
        if ($writer == $result["title"])
        {
            echo "<p class="post-author">작성자 : $writer</p>"

    if ($content == $result["content"])
    {
        echo "<p>$content</p>"
    }

    if ($createDateTime == $result["createDatetime"])
    {
        echo "<p>작성일자 : $createDateTime</p>"
    }
}