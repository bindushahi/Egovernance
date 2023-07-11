<!DOCTYPE html>
<html>
<head>
    <title>Road Condition Updates</title>
    <style>
        /* Add your desired CSS styling here */
    </style>
</head>
<body>
    <h1>Road Condition Updates</h1>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // PHP code to fetch updates from the database and generate HTML content
    // Replace DB_HOST, DB_USER, DB_PASS, and DB_NAME with your database credentials
    $conn = mysqli_connect("localhost", "root", "", "road safety monitoring system");

    // Fetch updates from the database
    $query = "SELECT * FROM roadconditionupdates";
    $result = mysqli_query($conn, $query);

    // Check if there are any updates
    if (mysqli_num_rows($result) > 0) {
        // Loop through the updates and generate HTML content
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="update">';
            echo '<h2>' . $row['Location'] . '</h2>';
            echo '<p>' . $row['Description'] . '</p>';
            echo '<p>' . $row['Timestamp'] . '</p>';
            // Add more HTML content if needed
            echo '</div>';
        }
    } else {
        echo '<p>No updates available</p>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
