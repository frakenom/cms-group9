<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Oasis Assignment</title>
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
            $query = 'SELECT id, name, image
                FROM department';

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

        <!-- Department page ------------------------------------------------------------------ -->

        <div class="fix-container">
            <section class="department-section">
                
                <h1> All Departments</h1>

            <!-- Hero-image -->
            <?php while ($record = mysqli_fetch_array($result)) { ?>

                <div class="box">
                    <img src="<?php echo $record['image']; ?>" alt="hero" >       
                </div> 

                <div class="middle">
                    <div class="text"><?php echo $record['name']; ?></div>
                </div>
            
            <?php } ?>

            </section>


        </div>

        <footer> 
                <div class="bottom-footer">
                    <h3>All right reserved. 2021.</h3>
                </div>
        </footer>
    
    </body>
</html>
