<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>

<ul id="dashboard">
  <li>
    <a href="projects.php">
      Manage Projects
    </a>
  </li>

  <li>
    <a href="home.php">
      Manage Home
    </a>
  </li>

  <li>
    <a href="dept.php">
      Manage Department
    </a>
  </li>
  
  <li>
    <a href="program.php">
      Manage Program
    </a>
  </li>

  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
</ul>

<?php

include( 'includes/footer.php' );

?>
