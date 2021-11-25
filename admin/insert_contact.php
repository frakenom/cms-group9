<?php
include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );


if(isset($_POST['submit']))
{		
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];

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

include( 'includes/footer.php' );
?>