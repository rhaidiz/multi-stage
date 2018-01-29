<?php
include 'config.inc.php';
session_start();
if (!isset($_SESSION['username'])){
  header("Location: index.php");
  echo $_SESSION['username'];
}

if(isset($_POST['phone'])){
  $name = $_FILES['avatar']['name'];
  echo $name;
  $query = "UPDATE users SET name='$_POST[name]' , surname='$_POST[surname]', phone = '$_POST[phone]', avatar = 'avatar/$name' WHERE username='$_SESSION[username]'";
  mysql_query($query);
  $up = move_uploaded_file($_FILES["avatar"]["tmp_name"],"avatar/" . $name);
}

$query = "SELECT * FROM users WHERE username='$_POST[user]'";
$res = mysql_query($query);
$row = mysql_fetch_assoc($res);
 ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <!--[if IE]><![endif]-->

  <?php  /*SEO Info */ ?>
  <meta name="author" content="Federico De Meo - demeof@gmail.com" />


  <title></title>

  <!-- Fav Icon -->
  <link rel="shortcut icon" href="img/fav.png" type="image/png" />

      <link rel="stylesheet" type="text/css" href="css/default.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->

</head>
<body>
  <div id="line-top">
    <div id="welcome">Welcome *bash* <span id="user"><?php echo $_SESSION['username'] ?></span></div>
    <div id="logout"><a href="dashboard.php">select profile</a> | <a href="index.php">logout</a></div>
    <div class="divider"></div>
  </div>

<div id="wrapper">

	<header>
        <?php echo $_POST['user'] ?>
	</header>
      <hr>
      <?php if($_SESSION['username'] != $_POST['user']){ ?>
    	   <section>
         <img src="<?php echo $row['avatar'] ?>" style="width:300px">
          <table>
          <tr>
              <td class="col1">Name: </td>
              <td><?php echo $row['name'] ?></td>
          </tr>
          <tr>
            <td colspan="2" class="h" ></td>
          </tr>
          <tr>
              <td>Surname: </td>
              <td><?php echo $row['surname'] ?></td>
          </tr>
          <tr>
            <td colspan="2" class="h" ></td>
          </tr>
          <tr>
              <td>Phone: </td>
              <td><?php echo $row['phone'] ?> </td>
          </tr>
        </table>
        <a href="dashboard.php">Back</a>
        </section>
    <?php } else {  ?>
      <section>
      <img src="<?php echo $row['avatar'] ?>" style="width:300px">
      <form action="profile.php" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
              <td>Name: </td>
              <td><input type="text" name="name" class="text-input"  value="<?php echo $row['name'] ?>"></td>
          </tr>
          <tr>
            <td colspan="2" class="h" ></td>
          </tr>
          <tr>
              <td>Surname: </td>
              <td><input type="text" name="surname" class="text-input"  value="<?php echo $row['surname'] ?>"></td>
          </tr>
          <tr>
            <td colspan="2" class="h" ></td>
          </tr>
          <tr>
              <td>Phone: </td>
              <td><input type="text" name="phone" class="text-input"  value="<?php echo $row['phone'] ?>"></td>
          </tr>
          <tr>
              <td>Avatar: </td>
              <td><input type="file" name="avatar" id="avatar"></td>
          </tr>
        </table>
        <button type="submit" class="button">Save</button>
      </form>
    </section>
  <?php } ?>
</div>

</body>
</html>
