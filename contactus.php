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
     $connect = mysqli_connect(
        'sql208.epizy.com', //hostname
        'epiz_30348373', //username
        'gpwDiTjdJMBKqIr', //password
        'epiz_30348373_cmsgroup9'); //database

    // Error message: If the connection didn't go through

    if (!$connect) 
    {
        echo 'Error Code: ' . mysqli_connect_errno() . '<br>';
        echo 'Error Message: ' . mysqli_connect_error() . '<br>';
        exit;
    }

    // Taking all 5 values from the form data(input)

    $fullname =  $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $student =  $_REQUEST['student'];
    $program = $_REQUEST['program'];
    $message = $_REQUEST['message'];
      
    // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO contact VALUES ('$fullname', 
        '$email','$student','$program','$message')";
      
    if(mysqli_query($connect, $sql))
    {
        echo "Please fill the form if you have a question for us."; 
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($connect);
    }

    // Close connection
    mysqli_close($connect);
?>

    <h1>Contact Us</h2>

    <form method="POST">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Your Full Name" required>

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

        <label for="message">Please type in your question:</label>
        <textarea id="message" name="message" style="height:200px" required></textarea>

        <input type="submit" value="Submit">
    </form>

    

</body>
</html>