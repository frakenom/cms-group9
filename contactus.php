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
  Full Name : <input type="text" name="fullname" placeholder="Enter Full Name" Required>
  <br/>
  Age : <input type="text" name="age" placeholder="Enter Age" Required>
  <br/>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>