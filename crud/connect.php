<?php
$conn = new mysqli('localhost', 'root', '', 'crud');
if (! $conn) {
    die("This is an error".mysqli_error($conn));
}