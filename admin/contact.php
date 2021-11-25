<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM contact
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Home has been deleted' );
  
  header( 'Location: contact.php' );
  die();
  
}

$query = 'SELECT *
  FROM contact
  ORDER BY id DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Contact List</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Full Name</th>
    <th align="center">Email</th>
    <th align="center">Student Status</th>
    <th align="center">Program</th>
    <th align="center">Message</th>

    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo htmlentities( $record['fullname'] ); ?></td>
      <td align="center"><?php echo $record['email']; ?></td>
      <td align="center"><?php echo $record['student']; ?></td>
      <td align="center"><?php echo $record['program']; ?></td>
      <td align="center" style="white-space: text-wrap;"><?php echo htmlentities( $record['message'] ); ?></td>




      <td align="center">
        <a href="contact.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this contact?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<?php

include( 'includes/footer.php' );

?>