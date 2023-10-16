<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>UCR Service</title>
</head>

<body>

    <div class="home-content-main">
        <!-- Navbar Start -->
        <div class="navbar">
            <div class="logo">
                <img src="../assets/Logo.jpg" alt="logo">
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="../index.html">
                            <h3>Home</h3>
                        </a></li>
                    <li><a href="packages.php">
                            <h3>Packages</h3>
                        </a></li>
                    <li><a href="#">
                            <h3>Benefits</h3>
                        </a></li>
                    <li><a href="#">
                            <h3>About Us</h3>
                        </a></li>
                </ul>
            </div>
            <div class="user-info">
                <img src="../assets/userprofile.png" alt="user-icon">
                <p>Welcome <br>User</p>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Package Details Start -->
        <div class="packages-content">

            <div class="pc-header">
                <h1>Package Details</h1>
            </div>

            <div class="pc-details">
                <?php

    include '../php/config.php';


    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM packages";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $package_name = $row['package_name'];
            $vehicle_name = $row['vehicle_name'];
            $vehicle_type = $row['vehicle_type'];
            $hourly_rate = $row['hourly_rate'];
            $vehicle_image = $row['vehicle_image'];

          
            echo '<div class="package-details-box">';
            echo '<h2>' . $package_name . '</h2>';
            echo '<div class="pcd-img">';
            echo '<img src="../assets/' . $vehicle_image . '" alt="' . $vehicle_name . '">';
            echo '</div>';
            echo '<div class="pcd-info">';
            echo '<p><b>Vehicle Name :</b></p>';
            echo '<p>' . $vehicle_name . '</p>';
            echo '</div>';
            echo '<div class="pcd-info">';
            echo '<p><b>Vehicle Type :</b></p>';
            echo '<p>' . $vehicle_type . '</p>';
            echo '</div>';
            echo '<div class="pcd-info">';
            echo '<p><b>Hourly Rate :</b></p>';
            echo '<p>' . $hourly_rate . '</p>';
            echo '</div>';
            echo '<div class="pcd-button">';
            echo '<button>Reserve</button>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No packages available.";
    }


    $conn->close();
    ?>
            </div>

        </div>
        <!-- Package Details End -->



        <!-- Footer Start -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-about">
                    <h2>About Us</h2>
                    <p>Your Journey, Our Priority. At UCR Service, we're dedicated <br> to providing hassle-free car
                        rental
                        solutions. With a fleet of <br>top-notch vehicles and a commitment to exceptional customer<br>
                        service,
                        we're here to make your travels smooth and memorable. <br>Whether you're a local explorer or a
                        globetrotter, choose UCR <br>Service for reliable, affordable, and convenient transportation<br>
                        options. Your satisfaction is our driving force.
                    </p>
                </div>
                <div class="footer-address">
                    <h2>Address</h2>
                    <p>123 Street, Malabe, Kaduwela</p>
                    <p>+94 345 67890</p>
                    <p>contact@ucr.com</p>
                </div>
                <div class="footer-links">
                    <h2>Quick Links</h2>
                    <p>About Us</p>
                    <p>Contact Us</p>
                    <p>Our Services</p>
                    <p>Terms & Conditions</p>
                    <p>Support</p>
                </div>
                <div class="footer-links">
                    <h2>Social Links</h2>
                    <p>Facebook</p>
                    <p>Whatsapp</p>
                    <p>Instagram</p>
                    <p>Twitter</p>
                    <p>Dribble</p>
                </div>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                <a href="#">DashIT</a>.
            </p>
        </div>
        <!-- Footer End -->
    </div>


    <script src="script.js"></script>
</body>

</html>