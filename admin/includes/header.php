<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="/admin/styles.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
  
  <h1>Website Admin</h1>
  
  <p style="padding: 0 1%; text-align: center;">
    <a href="dashboard.php">Dashboard</a> | 
    <a href="logout.php">Logout</a>
  </p>
  
  <hr>
  
  <?php echo get_message(); ?>
  
  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">
  
