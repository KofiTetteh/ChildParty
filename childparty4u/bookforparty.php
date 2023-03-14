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
                      <li><a href="calendar.php">calendar</a></li>
                      <li class="active"><a href="bookforparty.php">booking</a></li>
                      <li><a href="partylist.php">party</a></li>
                      <li><a href="logout.php">logOut</a></li>
                </ul>
          </div>
      </nav>
      <div class="container">
          <div class="col-xs-6 col-xs-push-3">
              <?php include 'book.php'; ?>
              <h1 class="text-center">book for a party</h1>
              <form class="" action="bookforparty.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="un" value="<?php echo $u['customername']; ?>">
              <div class="form-group">
                <label for="">Party type</label>
                <select class="form-control" name="pt" required="">
                    <?php $ptype = $db->query('SELECT partytype FROM party ORDER by partytype');
                    while ($pt = $ptype->fetch()) {
                       echo '<option value="'.$pt['partytype'].'">'.$pt['partytype'].'</option>';
                    } ?>
                </select>
              </div>
              <div class="form-group">
                  <label for="">your number</label>
                  <input type="number" class="form-control" id="" name="nb" placeholder="" required="">
              </div>
			  <div class="form-group">
                  <label for="">email address</label>
                  <input type="email address" class="form-control" id="" name="em" placeholder="" required="">
              </div>
              <div class="form-group">
                  <label for="">your budget per child</label>
                  <input type="number" class="form-control" id="" name="bc" placeholder="" required="">
              </div>
              <div class="form-group">
                  <label for="">number of child</label>
                  <input type="number" class="form-control" id="" name="nc" placeholder="" required="">
              </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-xs-4">
                          <div class="form-group">
                            <label for=""> day</label>
                            <input type="number" class="form-control" id="" placeholder="" required="" name="D">
                          </div>
                      </div>
                      <div class="col-xs-4">
                          <div class="form-group">
                            <label for=""> month</label>
                            <input type="number" class="form-control" id="" placeholder="" required="" name="M">
                          </div>
                      </div>
                      <div class="col-xs-4">
                          <div class="form-group">
                            <label for=""> year</label>
                            <input type="number" class="form-control" id="" placeholder="" required="" name="Y">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success form-control" placeholder="" name="add">
              </div>
              </form>
              </div>
          </div>
      </div>
  </body>
</html>
