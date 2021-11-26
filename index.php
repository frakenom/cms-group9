<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>CMS Assignment</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
        <link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
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

        <header>
            <div class="fix-container">             
                <nav class="navbar">
                    <div class="left-header">
                        <a href="http://mmdd209-group9.infinityfreeapp.com">Oasis University</a>
                    </div>
                    <div class="right-header">
                        <ul>
                            <li>
                                <a id="active" class="one" href="http://mmdd209-group9.infinityfreeapp.com">Home</a>
                            </li>
                            <li>
                                <a class="two" href="department.html">Department</a>
                            </li>
                            <li>
                                <a class="three" href="purchase.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>           
            </div>
        </header>
        <!-- Home page ------------------------------------------------------------------ -->
        <div class="fix-container">
            <section class="hero-section">

            <!-- Hero-image -->
            <?php while ($record = mysqli_fetch_array($result)) { ?>

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
                <p><a class="white" href="department.html"><span class="bg"></span><span class="base"></span><span class="text">Learn more</span></a></p>
            </div>
                
            </section>

            <section class="detail-section">
                <h1>FACULTIES & PROGRAMS</h1>
                    <div class="home-department">
                        
                        <?php while ($record = mysqli_fetch_array($result)){?>
                            
                            <div class="department">

                                <img src="<?php echo $record['image']; ?>" alt="hero" height="300px">
                                <h2><?php echo $record["heading"]; ?></h2>

                            </div>
                            
                        <?php  } ?>
                        
                    </div>
            </section>
        </div>
    
    </body>
</html>
