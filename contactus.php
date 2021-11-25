<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Conact Us</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css">  -->
</head>
<body>
<?php

    // Connect to the MySQL database
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

    // created a query
    $query = 'SELECT id, heading, subheading, body, image
        FROM home';

    // query execution
    $result = mysqli_query($connect, $query);

    // Error message: If no result found
    if (!$result)
    {
        echo 'Error Message: ' . mysqli_error($connect) . '<br>';
        exit;
    }
?>

<form action="admin/insert_contact.php" method="POST">
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