<?php
// $host = "localhost";
// $user = "root";
// $pass = "";
// $db = "akademik";

// $connect = mysqli_connect($host, $user, $pass, $db);
// if (!$connect) {
//     die("Connection Terminated");
//     }else {
//         echo "Connection Successfull";
// }

$connect = new mysqli('localhost', 'root', '', 'akademik');
if (!$connect) {
    die(mysqli_error($connect));
    // }else {
    //     echo "Connection Successfull";
}
