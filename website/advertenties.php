<?php
include "test.php";

$result = $conn->query("SELECT * FROM test");

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>