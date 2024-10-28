<?php

 include("../conn.php");
 $id=$_GET["id"];
 $sql="delete from registration where Sid=$id";
 $result=mysqli_query($conn,$sql);
 header("Location:components.php");

?>