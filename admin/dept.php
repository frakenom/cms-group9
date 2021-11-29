<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM department
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Department has been deleted' );
  
  header( 'Location: dept.php' );
  die();
  
}

$query = 'SELECT *
  FROM department
  ORDER BY name DESC';
$result = mysqli_query( $connect, $query );

include 'includes/wideimage/WideImage.php';

?>

<h2>Manage Department</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="center">Name</th>
    <th align="center">URL</th>

    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=department&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="center"><?php echo $record['url']; ?></td>
      <td align="center"><a href="dept_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="dept_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="dept.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this department?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="dept_add.php"><i class="fas fa-plus-square"></i> Add Department</a></p>


<?php

include( 'includes/footer.php' );

?>