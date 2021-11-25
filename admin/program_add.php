<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['text'] )
  {
    
    $query = 'INSERT INTO program (
        name,
        text,
        department_id
        ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['text'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['department_id'] ).'"

      )';



    mysqli_query( $connect, $query );
    
    set_message( 'Program has been added' );
    
  }
  
  header( 'Location: program.php' );
  die();
  
}

?>

<h2>Add Program</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="text">Text:</label>
  <textarea type="text" name="text" id="text" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#text' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="department_id">Department:</label>
  <?php
  $query = 'SELECT *
  FROM department
  ORDER BY name DESC';
  $result = mysqli_query( $connect, $query );
  
  
  echo '<select name="department_id" id="department_id">';
  while( $record = mysqli_fetch_assoc( $result ))
  {
    echo '<option value="'.$record['id'].'"';
    echo '>'.$record['name'].'</option>';
  }
  echo '</select>';
  
  ?> 
  
  <br>
  
  <input type="submit" value="Add Program">
  
</form>

<p><a href="program.php"><i class="fas fa-arrow-circle-left"></i> Return to Program List</a></p>


<?php

include( 'includes/footer.php' );

?>