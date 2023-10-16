<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM packages WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        // Deletion failed
        echo "Deletion failed.";
    }
}
?>