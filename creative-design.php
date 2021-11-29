<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Oasis University</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
        <link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
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
            $query = 'SELECT id, text, name, image, department_id
                FROM program';

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

                <!-- menu items -->

                    <div class="right-header">
                        <ul>
                            <li>
                                <a class="one" href="http://mmdd209-group9.infinityfreeapp.com">Home</a>
                            </li>
                            <li>
                                <a id="active" class="two" href="department.php">Department</a>
                            </li>
                            <li>
                                <a class="three" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>           
            </div>
        </header>

        <!-- creative art and design page ------------------------------------------------------------------ -->

        <div class="fix-container">
            <section class="program-section">

                <h1>Creative Arts and Design</h1>

            <!-- fetching program of creative art and design-->
            <?php while ( $record = mysqli_fetch_array($result)) { 
                $test = $record['department_id'];
                if($test == '2'){?>                       

                    <div class="program">

                        <!-- program image -->

                        <div class="program-image">
                            
                            <img class="program-image-style" src="<?php echo $record['image']; ?>" alt="hero" >       

                        </div>

                        <!-- program details -->

                        <div class="program-text">

                            <h2><?php echo $record['name']; ?></h2>
                            <p><?php echo $record['text'];  ?></p>

                        </div>

                    </div>

                <?php }} ?>

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
