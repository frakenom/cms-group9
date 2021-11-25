<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM program
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Program has been deleted' );
  
  header( 'Location: program.php' );
  die();
  
}

$query = 'SELECT program.id,
program.name,
program.text,
program.image,
department.name AS department
  FROM program
  LEFT JOIN department
  ON program.department_id = department.id
  ORDER BY name DESC';
$result = mysqli_query( $connect, $query );

include 'includes/wideimage/WideImage.php';

?>

<h2>Manage Program</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Content</th>
    <th align="center">Department</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=program&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['name'] ); ?>
      </td>
      <td align="left" style="white-space: text-wrap;"><?php echo htmlentities( $record['text'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['department'] ); ?></td>
      <td align="center"><a href="program_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="program_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="program.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this program?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="program_add.php"><i class="fas fa-plus-square"></i> Add Program</a></p>


<?php

include( 'includes/footer.php' );

?>