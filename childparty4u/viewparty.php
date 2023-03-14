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
                      <li><a href="addnewparty.php">Add New Party</a></li>
                      <li class="active"><a href="viewparty.php">view party</a></li>
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
          <div class="col-xs-8 col-xs-push-2">
              <div class="page-header">
                  <h1>Parties</h1>
                </div>
              <table class="table table-condensed">
                  <thead>
                      <tr>
                          <th>image</th>
                          <th>type</th>
                          <th>desc.</th>
                          <th>cost</th>
                          <th>length</th>
                          <th>max att.</th>
                          <th>prod. n serv.</th>
                          <th>option</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $partysel = $db->query('SELECT * FROM party ORDER BY partyid DESC');
                      while ($ps = $partysel->fetch()) {
                          echo '<tr>
                            <td class="text-center"><img src="images/'.$ps['partyImg'].'" alt="'.$ps['partytype'].'" class="img-32"/></td>
                            <td class="text-center">'.$ps['partytype'].'</td>
                            <td class="text-center">'.$ps['partyDesc'].'</td>
                            <td class="text-center">£'.$ps['costperchild'].'</td>
                            <td class="text-center">'.$ps['partylength'].'Min</td>
                            <td class="text-center">'.$ps['nochildattend'].'</td>
                            <td class="text-center">'.$ps['prodnservices'].'</td>
                            <td class="text-center">
                                <p>
                                    <a href="addnewparty.php?opt=edit&id='.$ps['partyid'].'">edit</a>
                                </p>
                                <p>
                                    <a href="viewparty.php?opt=del&id='.$ps['partyid'].'">delete</a>
                                </p>
                            </td>
                          </tr>';
                      }
                       ?>

                  </tbody>
              </table>
          </div>
      </div>
  </body>
</html>
