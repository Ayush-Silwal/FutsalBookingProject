<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['login_status'] !== true) {
    // Redirect the user to the login page
    header("Location: login.php?err=1");
    exit;
}
?>
<?php
// Assuming you have already established a database connection
include "connect.php";
// Retrieve data from player
$query = "SELECT * FROM players";
$result = mysqli_query($conn, $query);

// Retrieve data from booking_details table
$query2 = "SELECT * FROM book_details";
$result2 = mysqli_query($conn, $query2);

// Check if any data exists
if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0) {
    // Display the data in a table
    echo '<table border= "1">';
    echo '<tr>
            <th>player name</th>
            <th>Email</th>
            <th>phone</th>
            <th>court name</th>
            <th>price</th>
            <th>status</th>
            <th>Action</th>
          </tr>';

    while ($row1 = mysqli_fetch_assoc($result)){ 
        $row2 = mysqli_fetch_assoc($result2); 
        echo '<tr>';
        echo '<td>' . $row1['username'] . '</td>';
        echo '<td>' . $row1['email'] . '</td>';
        echo '<td>' . $row1['phone'] . '</td>';
        echo '<td>' . $row1['name'] . '</td>';
        echo '<td>' . $row2['price'] . '</td>';
        echo '<td>' . $row2['status'] . '</td>';
        echo '<td>
                <form method="POST" action="update_status.php">
                  
                  <input type="submit" value="Update">
                </form>
              </td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>



