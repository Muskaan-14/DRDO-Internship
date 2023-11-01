<?php

$data = $_GET['last'];
$a = "r8";
for ($x = 2; $x <= $data; $x++) {
    echo "<textarea name='$a$x' cols='40'></textarea><br>";
}
for ($x = $data + 1; $x <= 8; $x++) {
    echo "<textarea class='d-none' name='$a$x' cols='40'></textarea>";
}
?>