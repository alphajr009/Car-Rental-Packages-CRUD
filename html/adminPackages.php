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
                    <li><a href="">
                            <h3>Home</h3>
                        </a></li>
                    <li><a href="adminPackages.php">
                            <h3>Packages</h3>
                        </a></li>
                    <li><a href="#">
                            <h3>Benefits</h3>
                        </a></li>

                </ul>
            </div>
            <div class="user-info">
                <img src="../assets/userprofile.png" alt="user-icon">
                <p>Welcome <br>User</p>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Admin Packages Details Start -->
        <div class="admin-packages-content">
            <div class="tab-buttons">
                <button id="packagesTab" class="active tb-buttons"><b>Packages</b></button>
                <button id="createTab" class="tb-buttons"><b>Create New Package</b></button>
            </div>

            <div id="packagesContent" class="tab-content active-content">
                <!-- "Packages" tab -->

                <h2>Packages</h2>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Package Name</th>
                            <th>Vehicle Name</th>
                            <th>Hourly Rate</th>
                            <th>Vehicle Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             require '../php/config.php';
                

                            $query = "SELECT * FROM packages";
                           
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $row['package_name'] . '</td>';
                                    echo '<td>' . $row['vehicle_name'] . '</td>';
                                    echo '<td>' . $row['hourly_rate'] . '</td>';
                                    echo '<td>' . $row['vehicle_type'] . '</td>';
                                    echo '<td><button class="edit-btn" data-id="' . $row['id'] . '">Edit</button></td>';
                                    echo '<td><button class="delete-btn" data-id="' . $row['id'] . '">Delete</button></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                    </tbody>
                </table>




            </div>


            <!-- "Create New Package" tab -->

            <div id="createContent" class="tab-content">

                <h2>Create New Package </h2>

                <div class="newpackage-details-content">
                    <form action="../php/process_create.php" method="post" enctype="multipart/form-data">
                        <div class="form-all-options">

                            <div class="form-options">
                                <label for="name"><b>Package Name:</b></label>
                                <input type="text" id="name" name="name">
                            </div>

                            <div class="form-options">
                                <label for="email"><b>Vehicle Name:</b></label>
                                <input type="text" id="email" name="email">
                            </div>

                            <div class="form-options">
                                <label for="rate"><b>Hourly rate:</b></label>
                                <input type="text" id="rate" name="rate">
                            </div>

                            <div class="form-options2">
                                <label for="file" class="custom-file-input "><b>Vehicle Image :</b></label>
                                <input type="file" id="file" name="file">
                            </div>

                            <div class="form-options2">
                                <label for="category"><b>Vehicle Type:</b></label>
                                <select id="category" name="category">
                                    <option value="car">Car</option>
                                    <option value="suv">SUV</option>
                                    <option value="bus">Bus</option>
                                    <option value="van">Van</option>
                                    <option value="hypercar">Hyper Car</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn-submit" name="submit">Create</button>

                    </form>


                </div>



            </div>

            <!-- Edit Package Modal -->
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <h2>Edit Package</h2>
                    <form id="editForm">
                        <label for="editPackageName">Package Name:</label>
                        <input type="text" id="editPackageName" name="editPackageName">
                        <label for="editVehicleName">Vehicle Name:</label>
                        <input type="text" id="editVehicleName" name="editVehicleName">
                        <label for="editHourlyRate">Hourly Rate:</label>
                        <input type="text" id="editHourlyRate" name="editHourlyRate">
                        <button type="button" id="saveChanges">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>



        <!-- Admin Packages Details End -->




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

    <script src="../js/script.js"></script>
</body>

</html>