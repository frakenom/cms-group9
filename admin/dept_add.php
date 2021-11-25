<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] )
  {
    
    $query = 'INSERT INTO department (
        name
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'Department has been added' );
    
  }
  
  header( 'Location: dept.php' );
  die();
  
}

?>

<h2>Add Department</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  
  <br>
  
  
  <input type="submit" value="Add Department">
  
</form>

<p><a href="dept.php"><i class="fas fa-arrow-circle-left"></i> Return to Department List</a></p>


<?php

include( 'includes/footer.php' );

?>