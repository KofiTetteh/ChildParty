<?php include 'session.php'; include 'connect.php';
if(isset($_SESSION['id']))
{
    if ($_SESSION['id'] > 1) {
        header('location: calendar.php');
    }
    else {
        header('location: addnewparty.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogIn</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

      <h1 class="text-center">LogIn</h1>
      <div class="jumbotron text-center">
        <h1>ChildrenParty4U</h1>
        <p>Welcome to ChildrenParty4U register or login now to book for party.</p>
      </div>
      <form class="logForm" action="./" method="post">
          <?php include 'loginVerif.php'; ?>
          <div class="form-group">
            <label for="">username</label>
            <input type="text" class="form-control" id="" placeholder="" required="" name="username">
          </div>
          <div class="form-group">
            <label for="">password</label>
            <input type="password" class="form-control" id="" placeholder="" required="" name="password">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-success" id="" placeholder=""  name="login" value="LogIn">
          </div>
          <p class="text-center"><a href="Register.php">become a member</a></p>
      </form>
  </body>
</html>
