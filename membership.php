<?php
// Membership form processing
include "connect.php"; // Include database connection

$message = ""; // Variable to store success/error message

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data from $_POST
    $name = $_POST['name'];           // Get name from form
    $email = $_POST['email'];         // Get email from form
    $phone = $_POST['phone'];         // Get phone from form
    $plan = $_POST['plan'];           // Get plan from form

    // Create INSERT SQL query
    $sql = "INSERT INTO users (name, email, phone, plan) VALUES ('$name', '$email', '$phone', '$plan')";
    
    // Execute query and check if successful
    if (mysqli_query($conn, $sql)) {
        $message = "<div class='message success'>✓ Membership form submitted successfully!</div>"; // Success message
    } else {
        $message = "<div class='message error'>✗ Error: " . mysqli_error($conn) . "</div>"; // Error message
    }
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Membership - FitZone Gym</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <h1>💪 FitZone Gym</h1>
        <p>Transform Your Body, Transform Your Life</p>
    </header>

    <!-- Navigation -->
    <nav>
        <a href="index.html">Home</a>
        <a href="membership.php">Membership</a>
        <a href="contact.html">Contact</a>
        <a href="admin/dashboard.php">Admin Panel</a>
    </nav>

    <!-- Main Container -->
    <div class="container">
        
        <h2>Join FitZone Membership</h2>
        <p>Fill out the form below to join our gym and start your fitness journey today!</p>

        <!-- Display success or error message -->
        <?php echo $message; ?>

        <!-- Membership Form -->
        <form method="POST" action="membership.php">
            
            <label for="name"><b>Full Name:</b></label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email"><b>Email:</b></label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="phone"><b>Phone Number:</b></label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

            <label for="plan"><b>Select Membership Plan:</b></label>
            <select id="plan" name="plan" required>
                <option value="">-- Choose a Plan --</option>
                <option value="Basic - 1 Month">Basic - 1 Month ($29)</option>
                <option value="Basic - 3 Months">Basic - 3 Months ($75)</option>
                <option value="Premium - 1 Month">Premium - 1 Month ($49)</option>
                <option value="Premium - 6 Months">Premium - 6 Months ($250)</option>
                <option value="Platinum - Annual">Platinum - Annual ($499)</option>
            </select>

            <button type="submit">Submit Membership</button>

        </form>

        <!-- Membership Plans Info -->
        <h2>Membership Plans</h2>
        
        <div class="services">
            <div class="service-card">
                <h3>Basic Plan</h3>
                <p><b>$29/month</b></p>
                <p>✓ Gym Access<br>✓ 5 Days/Week<br>✓ Basic Equipment</p>
            </div>

            <div class="service-card">
                <h3>Premium Plan</h3>
                <p><b>$49/month</b></p>
                <p>✓ 24/7 Access<br>✓ All Equipment<br>✓ 1 Free Training Session</p>
            </div>

            <div class="service-card">
                <h3>Platinum Plan</h3>
                <p><b>$499/year</b></p>
                <p>✓ 24/7 Access<br>✓ Personal Trainer<br>✓ Nutrition Plan</p>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 FitZone Gym. All rights reserved.</p>
    </footer>

</body>
</html>
