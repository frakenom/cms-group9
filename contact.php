<!DOCTYPE html>
<html lang="en" >
    
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
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
                                <a class="one" href="http://mmdd209-group9.infinityfreeapp.com">Home</a>
                            </li>
                            <li>
                                <a  class="two" href="department.php">Department</a>
                            </li>
                            <li>
                                <a id="active" class="three" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>           
            </div>
        </header>

        <!-- Contact page ------------------------------------------------------------------ -->

        <div class="fix-container">
            <section class="contact-section">

                <h1>Contact Us</h1>
                <?php 
                    // Taking all 5 values from the form data(input)

                    $fullname =  $_REQUEST['fullname'];
                    $email = $_REQUEST['email'];
                    $student =  $_REQUEST['student'];
                    $program = $_REQUEST['program'];
                    $message = $_REQUEST['message'];
                    
                    // Performing insert query execution
                    // here our table name is contact
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

                <div class="contact-center">

                 <!-- FORM -->
                    <form method="POST">

                        <!-- Fullname -->
                            <div class="form-input">
                                <label for="fullname">Full Name</label>
                                <input class="input fullname" type="text" id="fullname" name="fullname" placeholder="Your Full Name" required>
                            </div>

                            <!-- Email -->
                            <div class="form-input">
                                <label for="email">E-mail</label>
                                <input class="input email" type="email" id="email" name="email" placeholder="Your Email" required>
                            </div>

                            <!-- Student Status -->
                            <div class="form-input">
                                <label for="student">Student</label>
                                    <select class="input correction" id="student" name="student">
                                        <option value="current">Current</option>
                                        <option value="new">New</option>
                                    </select>
                            </div>

                            <!-- Program Details -->

                            <div class="form-input"> 
                                <label for="program">Student</label>
                                    <select class="input correction" id="program" name="program">
                                        <option value="dept1">Information Technology</option>
                                        <option value="dept2">Creative Arts and Design</option>
                                        <option value="dept3">Business Management</option>
                                    </select>
                            </div>

                            <!-- Message -->
                            <div class="form-input">
                                <label for="message">Please type in your question:</label>
                                <textarea id="message" name="message" rows="4" cols="50" required></textarea>
                            </div>

                            <!-- Submit and Reset -->

                            <div class="form-input">
                                <input class="input btn submit-btn" type="submit" value="Submit" id="submit">
                                <input class="input btn" type="reset" value="Reset" id="reset" name="reset">
                            </div>
                        
                    </form> 
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