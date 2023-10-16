<?php
require 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['package_name']) && isset($data['vehicle_name']) && isset($data['hourly_rate'])) {
    $id = intval($data['id']);
    $package_name = $data['package_name'];
    $vehicle_name = $data['vehicle_name'];
    $hourly_rate = $data['hourly_rate'];

    $stmt = $conn->prepare("UPDATE packages SET package_name = ?, vehicle_name = ?, hourly_rate = ? WHERE id = ?");
    $stmt->bind_param("sssi", $package_name, $vehicle_name, $hourly_rate, $id); 

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Failed to update package: " . mysqli_error($conn);
    }

    $stmt->close();
} else {
    echo "Missing data for package update.";
}
?>