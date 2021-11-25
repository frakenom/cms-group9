<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['heading'] ) )
{
  
  if( $_POST['heading'] and $_POST['body'] )
  {
    
    $query = 'INSERT INTO home (
        heading,
        subheading,
        body,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['heading'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['subheading'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['body'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"

      )';


    mysqli_query( $connect, $query );
    
    set_message( 'Home has been added' );
    
  }
  
  header( 'Location: home.php' );
  die();
  
}

?>

<h2>Add Home</h2>

<form method="post">
  
  <label for="heading">Heading:</label>
  <input type="text" name="heading" id="heading">
    
  <br>

  <label for="subheading">Sub-Heading:</label>
  <input type="text" name="subheading" id="subheading">
  
  <br>
  
  <label for="body">Body:</label>
  <textarea type="text" name="body" id="body" rows="10"></textarea>

  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#body' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  
  <input type="submit" value="Add Home">
  
</form>

<p><a href="home.php"><i class="fas fa-arrow-circle-left"></i> Return to Home List</a></p>


<?php

include( 'includes/footer.php' );

?>