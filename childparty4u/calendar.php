<?php include 'session.php'; include 'connect.php';
if($_SESSION['id'] <= 1)
{
    header('location: ./');
}

$us = $db->prepare('SELECT * FROM customer WHERE customerid = ?');
$us->execute(array($_SESSION['id']));
$u = $us->fetch();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery.min.js"></script>
  </head>
  <body>
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">ChildrenParty4U </a>
                </div>
                <ul class="nav navbar-nav">
                      <li class="active"><a href="calendar.php">calendar</a></li>
                      <li><a href="bookforparty.php">booking</a></li>
                      <li><a href="partylist.php">party</a></li>
                      <li><a href="logout.php">logOut</a></li>
                </ul>
          </div>
      </nav>
      <div class="container">
          <div class="col-xs-10 col-xs-push-1">
              <h1 class="text-center">booking calendar</h1>
              <?php include_once('functions.php'); ?>
              <div id="calendar_div">
             	<?php echo getCalender(); ?>
             </div>
          </div>
      </div>
  </body>
</html>
