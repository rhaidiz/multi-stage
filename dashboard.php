<?php
ob_start();
session_start();
include 'config.inc.php';
if ($_SESSION['username'] == ""){
  header("Location: index.php");
}
 ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <!--[if IE]><![endif]-->

  <?php  /*SEO Info */ ?>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Federico De Meo - demeof@gmail.com" />

  <title>demeo.eu - Chained attack</title>

      <link rel="stylesheet" type="text/css" href="css/default.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>

  <div id="line-top">
    <div id="welcome">Welcome *bash* <span id="user"><?php echo $_SESSION['username'] ?></span></div>
    <div id="logout"><a href="index.php">logout</a></div>
    <div class="divider"></div>
  </div>
  <div id="view-profile">
	   <header>Select a profile to view:</header>
        <form action="profile.php" method="POST">
        <select name="user" id="options">
        <?php
        $query = "SELECT username FROM users";
        $res = mysql_query($query);
        while($row = mysql_fetch_assoc($res)){
          echo "<option value=\"".$row['username']."\">".$row['username']."</option>";
        }
         ?>
        </select>
      <button type="submit" class="button">View</button>
      <br>
  </form>
  </div>
</body>
</html>
