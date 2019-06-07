<?php
$lik = mysqli_connect('localhost','root','123','users');
$sql = "DROP TABLE IF EXISTS users_3";
$result = mysqli_query($lik,$sql);
if($result){
    echo "delete OK";
}

?>