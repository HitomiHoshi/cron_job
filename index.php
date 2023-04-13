<?php
$sql_host = 'localhost';
$sql_name = 'customers_api';
$sql_user = 'root';
$sql_pass = 'ikramatic123';

$conn = new mysqli($sql_host, $sql_user, $sql_pass, $sql_name);
$conn->set_charset("utf8mb4");

// $str = "INSERT INTO departments(name) VALUES ('TestValue')";

$today = date("Y-m-d");
$departments_temp = "SELECT * FROM departments";
$result = $conn->query($departments_temp);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["date"] < $today) {
                $id = $row["id"];
                $str = "UPDATE departments Set date='0000-00-00' WHERE Id='$id'";
                $conn->query($str);
        }
    }
}

mysqli_close($conn);
