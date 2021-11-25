<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css">  -->
</head>
<body>
<?php
    include "admin/includes/database.php"; // Using database connection file here

    if(isset($_POST['submit']))
    {		
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $student = $_POST['student'];
        $program = $_POST['program'];
        $message = $_POST['message'];

        $insert = mysqli_query($connect,"INSERT INTO `contact`(`fullname`, `email`, 'student', 'program', 'message') VALUES ('$fullname','$email', '$student', '$program', '$message')");

        if(!$insert)
        {
            echo mysqli_error();
        }
        else
        {
            echo "Records added successfully.";
        }
    }

    mysqli_close($connect); // Close connection
?>

    <h3>Fill the Form</h3>

    <form method="POST">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="name" placeholder="Your Full Name" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>

        <label for="student">Student</label>
        <select id="student" name="student">
        <option value="current">Current</option>
        <option value="new">New</option>
        </select>

        <label for="program">Student</label>
        <select id="program" name="program">
        <option value="dept1">Information Technology</option>
        <option value="dept2">Creative Arts and Design</option>
        <option value="dept3">Business Management</option>
        </select>

        <label for="subject">Please type in your question:</label>
        <textarea id="subject" name="subject" style="height:200px"></textarea>

        <input type="submit" value="Submit">
    </form>

</body>
</html>