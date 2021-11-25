<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM home
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Home has been deleted' );
  
  header( 'Location: home.php' );
  die();
  
}

$query = 'SELECT *
  FROM home
  ORDER BY id DESC';
$result = mysqli_query( $connect, $query );

include 'includes/wideimage/WideImage.php';

?>

<h2>Manage Home</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Heading</th>
    <th align="center">Sub-Heading</th>
    <th align="center">Body</th>

    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
      <img src="image.php?type=home&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left"><?php echo htmlentities( $record['heading'] ); ?></td>
      <td align="center"><?php echo $record['subheading']; ?></td>
      <td align="left"><?php echo $record['body']; ?></td>


      <td align="center"><a href="home_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="home_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="home.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this Home?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="home_add.php"><i class="fas fa-plus-square"></i> Add Home</a></p>


<?php

include( 'includes/footer.php' );

?>