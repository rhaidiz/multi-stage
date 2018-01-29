<?php
session_start();
session_destroy();

if(isset($_POST['action']) && $_POST['action'] == "create"){
	ob_start();
	include 'config.inc.php';
	$sql = "INSERT INTO users (username,password) VALUES (\"".$_POST['username']."\",\"".$_POST['password']."\")";
	$status = mysql_query($sql);

}

if(isset($_POST['action']) && $_POST['action'] == "signin"){
	ob_start();
	include 'config.inc.php';
	$query = "SELECT username,password FROM users WHERE username='".$_POST['username']."' AND password = '".$_POST['password']."'";
	$r = mysql_query($query);
	$row = mysql_num_rows($r);
	$data = mysql_fetch_assoc($r);
	
	  if($row >= 1){
	    // redirect to the dashboard page
	    session_start();
	    $_SESSION['username']=$data['username'];
	    header("Location: dashboard.php");
	  } else{
	    $error = 1;
	  }
}

 ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <!--[if IE]><![endif]-->

  <?php  /*SEO Info */ ?>
  <meta name="author" content="Federico De Meo" />

  <title>demeo.eu - Chained attack</title>

      <link rel="stylesheet" type="text/css" href="css/default.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
  <?php if(isset($error) && $error == 1) { ?>
  <div id="error">Login failed, for user <?php echo $_POST['username']; ?> username and/or password incorrect!!!</div>
  <?php } ?>
  <?php if(isset($status) && !$status) { ?>
  <div id="error">User <?php echo $_POST['username']; ?> not created.</div>
  <?php }elseif(isset($status) && $status){ ?>
  <div id="success">User <?php echo $_POST['username']; ?> created.</div>
	<?php } ?>
<div id="wrapper">
  <div id="logo">
    <br>
    <br>
    <br>
    <img src="img/logo.png">
  </div>
  <div id="login">
    <h3>Account login</h3>
    <form action="index.php" method="POST" charset="UTF-8">
      <span class="label">username</span>
      <input type="text"  id="signin-username"  autocomplete="on"
      name="username" class="text-input" /> <br />
      <span class="label">password</span>
      <input type="password"  id="signin-password" name="password"
      class="text-input" /> <br />
      <button type="submit" id="button">Sign in</button>
	<input type="hidden" name="action" value="signin" >
    </form>
    <br />
  </div>
  <div class="divider"></div>
<hr>
<div id="wrapper">
  <div id="logo">
    <br>
    <br>
    <br>
    <img src="img/add_user.png">
  </div>
  <div id="login">
    <h3>Create User</h3>
    <form action="index.php" method="POST" charset="UTF-8">
      <span class="label">username</span>
      <input type="text"  id="signin-username"  autocomplete="on"
      name="username" class="text-input" /> <br />
      <span class="label">password</span>
      <input type="password"  id="signin-password" name="password"
      class="text-input" /> <br />
      <button type="submit" id="button">Create</button>
	<input type="hidden" name="action" value="create" >
    </form>
    <br />
  </div>
  <div class="divider"></div>

</div>

</body>
</html>
