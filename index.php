<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Oasis University</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
        <link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
            $query = 'SELECT id, heading, subheading, body, image, url
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

<!-- start  -->

        <header>
            <div class="fix-container">
                
            <!-- navigation -->
                            
                <nav class="navbar">
                    
                <!-- Logo -->
                                        
                    <div class="left-header">
                        <a href="http://mmdd209-group9.infinityfreeapp.com">Oasis University</a>
                    </div>

                <!-- //menu item -->

                    <div class="right-header">
                        <ul>
                            <li>
                                <a id="active" class="one" href="http://mmdd209-group9.infinityfreeapp.com">Home</a>
                            </li>
                            <li>
                                <a class="two" href="department.php">Department</a>
                            </li>
                            <li>
                                <a class="three" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>           
            </div>
        </header>

        <!-- Home page ------------------------------------------------------------------ -->

        <div class="fix-container">
            <section class="hero-section">
                

            <?php while ($record = mysqli_fetch_array($result)) { ?>

            <!-- Hero-image -->

                <div class="hero-image">
                    <img src="<?php echo $record['url']; ?>" alt="hero" height="1000px">
                </div>    

            <!-- Hero message -->

                <div class="hero-message">

                    <h1><?php echo $record["heading"]; ?></h1>
                    <h3><?php echo $record["subheading"];?></h3>
                    <?php break;?>
                    
                </div>

            <?php } ?>

                <div class="hero-button">
                <p><a class="white" href="department.php"><span class="bg"></span><span class="base"></span><span class="text">Learn more</span></a></p>
            </div>
                
            </section>

<!-- Faculty Section -->

            <section class="detail-section">
                <h1>FACULTIES & PROGRAMS</h1>
                    <div class="home-department">
                        
                        <?php while ($record = mysqli_fetch_array($result)){?>
                            
<!-- Looping to get all depts. -->

                            <div class="department">

                                <a href="<?php echo $record['url'];?>"><img src="<?php echo $record['image']; ?>" alt="hero" height="300px"></a>
                                <h2><?php echo $record["heading"]; ?></h2>

                            </div>
                            
                        <?php  } ?>
                        
                    </div>
            </section>


        </div>

        <!-- Footer -->
        <footer> 
                <div class="bottom-footer">
                    <h3>All right reserved. 2021.</h3>
                </div>
        </footer>
    
    </body>
</html>
