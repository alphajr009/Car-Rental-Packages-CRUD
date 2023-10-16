<?php
require 'config.php';


if (isset($_POST['submit'])) {
    // Retrieve form data
    $packageName = mysqli_real_escape_string($conn, $_POST['name']);
    $vehicleName = mysqli_real_escape_string($conn, $_POST['email']);
    $hourlyRate = mysqli_real_escape_string($conn, $_POST['rate']);
    $vehicleType = mysqli_real_escape_string($conn, $_POST['category']);

    // Handle file upload
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size 
    if ($_FILES["file"]["size"] > 500000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
       
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $query = "INSERT INTO packages (package_name, vehicle_name, hourly_rate, vehicle_image, vehicle_type) VALUES ('$packageName', '$vehicleName', '$hourlyRate', '$targetFile', '$vehicleType')";

            if (mysqli_query($conn, $query)) {
                echo "Data and file uploaded successfully.";
                header("Location: ../html/adminPackages.php");

                exit;
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>