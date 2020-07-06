<?php
$conn = mysqli_connect('localhost', 'peter', '123456', 'ninijia_pizza');

//check connection
if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
