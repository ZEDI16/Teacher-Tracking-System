<?php
include 'db_connect.php'; // Include your database connection file

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Retrieve form data
    $subject = $_POST['subject'];
    $remarks = $_POST['remarks'];
    
    // Get the current date and time
    $currentDateTime = date('Y-m-d H:i:s');
    
    // Insert data into the database
    $sql = "INSERT INTO attendance_list (date, subject, remarks) VALUES ('$currentDateTime', '$subject', '$remarks')";
    if(mysqli_query($conn, $sql)){
        // Data inserted successfully
        echo "Data inserted successfully!";
    }else{
        // Error in inserting data
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- HTML form to input database information -->
<form method="POST" action="">
    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject" required>
    <br>
    <label for="remarks">Remarks:</label>
    <input type="text" name="remarks" id="remarks" required>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
