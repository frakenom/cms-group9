<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: home.php' );
  die();
  
}

if( isset( $_POST['heading'] ) )
{
  
  if( $_POST['heading'] and $_POST['body'] )
  {
    
    $query = 'UPDATE home SET
      heading = "'.mysqli_real_escape_string( $connect, $_POST['heading'] ).'",
      subheading = "'.mysqli_real_escape_string( $connect, $_POST['subheading'] ).'",
      body = "'.mysqli_real_escape_string( $connect, $_POST['body'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Home has been updated' );
    
  }

  header( 'Location: home.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM home
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: home.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Home</h2>

<form method="post">
  
  <label for="heading">Heading:</label>
  <input type="text" name="heading" id="heading" value="<?php echo htmlentities( $record['heading'] ); ?>">
    
  <br>

  <label for="subheading">Sub-heading:</label>
  <input type="text" name="subheading" id="subheading" value="<?php echo htmlentities( $record['subheading'] ); ?>">
    
  <br>
  
  <label for="body">Body:</label>
  <textarea type="text" name="body" id="body" rows="5"><?php echo htmlentities( $record['body'] ); ?></textarea>
  
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
  
  <input type="submit" value="Edit Home">
  
</form>

<p><a href="home.php"><i class="fas fa-arrow-circle-left"></i> Return to Home List</a></p>


<?php

include( 'includes/footer.php' );

?>