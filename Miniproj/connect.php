<?php
  $conn = new mysqli("localhost", "root", "shuaibzahid", "flight_management");
  if ($conn->connect_error){
    die("Could not connect to database" . $conn->connect_error);
    $verified=false;
  }
?> 



