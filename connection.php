<?php

$servername="localhost";
$username="root";
$password="";
$dbname="gulshanprojects";

$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
  die("failed connection " .mysqli_connect_error());
}
else
{
  // echo "connected";
}


?>