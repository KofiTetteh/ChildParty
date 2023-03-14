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
    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <h1 class="text-center">Register</h1>
      <div class="jumbotron text-center">
        <h1>ChildrenParty4U</h1>
        <p>Welcome to ChildrenParty4U register or login now to book for party.</p>
      </div>
      <form class="logForm" action="./register.php" method="post">
          <?php include 'regVerif.php'; ?>
          <div class="form-group">
            <label for="">username</label>
            <input type="text" class="form-control" id="" placeholder="" required="" name="un">
          </div>
          <div class="form-group">
            <label for="">Full name</label>
            <input type="text" class="form-control" id="" placeholder="" required="" name="fn">
          </div>
          <div class="form-group">
            <label for="">address</label>
            <input type="text" class="form-control" id="" placeholder="" required="" name="ad">
          </div>
          <div class="form-group">
            <label for="">email</label>
            <input type="email" class="form-control" id="" placeholder="" required="" name="em">
          </div>
          <div class="row">
              <label class="label-control">birth date</label>
              <div class="col-xs-4">
                  <div class="form-group">
                    <label for="">Day</label>
                    <input type="number" class="form-control" id="" placeholder="" required="" name="D">
                  </div>
              </div>
              <div class="col-xs-4">
                  <div class="form-group">
                    <label for="">Month</label>
                    <input type="number" class="form-control" id="" placeholder="" required="" name="M">
                  </div>
              </div>
              <div class="col-xs-4">
                  <div class="form-group">
                    <label for="">Year</label>
                    <input type="number" class="form-control" id="" placeholder="" required="" name="Y">
                  </div>
              </div>
          </div>

          <div class="form-group">
            <select name="gen" class="form-control">
                <option>Gender</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">password</label>
            <input type="password" class="form-control" id="" placeholder="" required="" name="psw">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" id="" placeholder=""  name="reg" value="Register">
          </div>
          <p class="text-center"><a href="./" >login</a></p>
      </form>
  </body>
</html>
