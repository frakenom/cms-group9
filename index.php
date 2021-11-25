<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CMS Assignment</title>
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

<div class="wrapper">

<!-- Header and Nav MenuBar ------------------------------------------------------------------ -->

    <header class="header"> 
        <nav class="navbar">
            <div class="home-logo">
                <img src="/images/logo.png" alt="logo" width="100px">
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#department">Department</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

<!-- Home page ------------------------------------------------------------------ -->

<section class="home-page">

    <?php while ($record = mysqli_fetch_array($result)) { ?>

<!-- Hero-image and message -->

    <div class="hero-image"> 
       
        <!-- <img src="<//?php echo $record["image"]; ?>"> -->
                
    </div>
    
    <div class="hero-message">


        <?php break 1;?>
        
    </div>

    <?php } ?>
    
</section>


</div>

<section class="home-page">
		<div class="home-department">
            
            <?php while ($record = mysqli_fetch_array($result)){?>
				
                <div class="department">

                    <h2><?php echo $record["heading"]; ?></h2>

                </div>
                
            <?php  } ?>
            
		</div>
</section>

  
</body>
</html>
