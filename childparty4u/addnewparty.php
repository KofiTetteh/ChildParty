<?php include 'session.php'; include 'connect.php';  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">ChildrenParty4U</a>
                </div>
                <ul class="nav navbar-nav">
                      <li class="active"><a href="addnewparty.php">Add New Party</a></li>
                      <li><a href="viewparty.php">view party</a></li>
                      <li><a href="viewbookings.php">view bookings</a></li>
                      <li><a href="logout.php">logOut</a></li>
                </ul>
          </div>
      </nav>
      <p class="text-center">
          <?php $get = false;
          if (isset($_GET['opt'])) {
              if($_GET['opt'] === 'del')
              {
                  $del = $db->prepare('DELETE FROM party WHERE partyid = ?');
                  if($del->execute(array($_GET['id'])))
                  {
                      echo 'article deleted';
                  }
                  else {
                      echo 'delete error';
                  }
              }
              elseif ($_GET['opt'] === 'edit') {

                  $act = $db->prepare('SELECT * FROM party WHERE partyid = ?');
                  $act->execute(array($_GET['id']));
                  if($a = $act->fetch())
                  {
                     $get = true;
                  }
              }
          } ?>
      </p>
      <div class="container-fluid">
          <div class="col-xs-6 col-xs-push-3">
              <?php include ($get) ? 'update.php' : 'addparty.php';
              ?>
              <div class="page-header">
                  <h1>Add new party</h1>
                </div>
              <form class="" action="addnewparty.php<?php echo ($get) ? '?opt=edit&id='.$a['partyid'] : '' ; ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo ($get) ? $a['partyid'] : '' ; ?>">
                  <div class="form-group">
                    <label for="">party type</label>
                    <input required="" type="text" class="form-control" id="" value="<?php echo ($get) ? $a['partytype'] : '' ; ?>" name="ptype">
                  </div>
                  <div class="form-group">
                    <label for="">party description</label>
                    <input required="" type="text" class="form-control" id="" value="<?php echo ($get) ? $a['partyDesc'] : '' ; ?>" name="pdesc">
                  </div>
                  <div class="form-group">
                    <label for="">party Cost</label>
                    <input required="" type="number" class="form-control" id="" value="<?php echo ($get) ? $a['costperchild'] : '' ; ?>" name="pcost">
                  </div>
                  <div class="form-group">
                    <label for="">party length</label>
                    <input required="" type="number" class="form-control" id="" value="<?php echo ($get) ? $a['partylength'] : '' ; ?>" name="plen">
                  </div>
                  <div class="form-group">
                    <label for="">party max attendants</label>
                    <input required="" type="number" class="form-control" id="" value="<?php echo ($get) ? $a['nochildattend'] : '' ; ?>" name="pma">
                  </div>
                  <div class="form-group">
                    <label for="">party prod and services</label>
                    <input required="" type="text" class="form-control" id="" value="<?php echo ($get) ? $a['prodnservices'] : '' ; ?>" name="pns">
                  </div>
                  <?php if(!$get)
                  { ?>
                      <div class="form-group">
                        <label for="">party image</label>
                        <input required="" type="file" class="form-control" id="" name="img">
                      </div>
                 <?php } ?>

                  <div class="form-group">
                    <input type="submit" class="btn btn-success form-control"  value="<?php echo ($get) ? 'Upload Party' : 'Add Party' ; ?>" id="" placeholder="" name="add">
                  </div>
              </form>
          </div>
      </div>
  </body>
</html>
