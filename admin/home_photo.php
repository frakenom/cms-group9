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

if( isset( $_FILES['image'] ) )
{
  
  if( isset( $_FILES['image'] ) )
  {
  
    if( $_FILES['image']['error'] == 0 )
    {

      switch( $_FILES['image']['type'] )
      {
        case 'image/png': 
          $type = 'png'; 
          break;
        case 'image/jpg':
        case 'image/jpeg':
          $type = 'jpeg'; 
          break;
        case 'image/gif': 
          $type = 'gif'; 
          break;      
      }

      $query = 'UPDATE home SET
        image = "data:image/'.$type.';base64,'.base64_encode( file_get_contents( $_FILES['image']['tmp_name'] ) ).'"
        WHERE id = '.$_GET['id'].'
        LIMIT 1';
      mysqli_query( $connect, $query );

    }
    
  }
  
  set_message( 'Home photo has been updated' );

  header( 'Location: home.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  if( isset( $_GET['delete'] ) )
  {
    
    $query = 'UPDATE home SET
      image = ""
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    $result = mysqli_query( $connect, $query );
    
    set_message( 'Home photo has been deleted' );
    
    header( 'Location: home.php' );
    die();
    
  }
  
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

include 'includes/wideimage/WideImage.php';

?>

<h2>Edit Home</h2>

<p>
  Note: For best results, images should be approximately 800 x 800 pixels.
</p>

<?php if( $record['image'] ): ?>

  <?php

  $data = base64_decode( explode( ',', $record['image'] )[1] );
  $img = WideImage::loadFromString( $data );
  $data = $img->resize( 200, 200, 'outside' )->crop( 'center', 'center', 200, 200 )->asString( 'jpg', 70 );

  ?>
  <p><img src="data:image/jpg;base64,<?php echo base64_encode( $data ); ?>" width="200" height="200"></p>
  <p><a href="home_photo.php?id=<?php echo $_GET['id']; ?>&delete"><i class="fas fa-trash-alt"></i> Delete this Image</a></p>

<?php endif; ?>

<form method="post" enctype="multipart/form-data">
  
  <label for="image">Photo:</label>
  <input type="file" name="image" id="image">
  
  <br>
  
  <input type="submit" value="Save Image">
  
</form>

<p><a href="home.php"><i class="fas fa-arrow-circle-left"></i> Return to Home List</a></p>


<?php

include( 'includes/footer.php' );

?>