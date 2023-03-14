<?php include 'session.php'; include 'connect.php';  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookings</title>

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
                      <li><a href="viewparty.php">view party</a></li>
                      <li class="active"><a href="viewbookings.php">view bookings</a></li>
                      <li><a href="logout.php">logOut</a></li>
                </ul>
          </div>
      </nav>
      <p class="text-center">
          <?php $get = false;
          if (isset($_GET['opt'])) {
              if($_GET['opt'] === 'del')
              {
                  $del = $db->prepare('DELETE FROM booking WHERE bookingid = ?');
                  if($del->execute(array($_GET['id'])))
                  {
                      echo 'article deleted';
                  }
                  else {
                      echo 'delete error';
                  }
              }
              elseif ($_GET['opt'] === 'val') {

                  $act = $db->prepare('UPDATE booking SET bookstatus = "1" WHERE bookingid = ?');
                  $act->execute(array($_GET['id']));
              }elseif ($_GET['opt'] === 'decl') {

                  $act = $db->prepare('UPDATE booking SET bookstatus = "0" WHERE bookingid = ?');
                  $act->execute(array($_GET['id']));
              }
          } ?>
      </p>
      <div class="container-fluid">

          <div class="col-xs-8 col-xs-push-2">
              <div class="page-header">
                  <h1>Bookings</h1>
                </div>
              <table class="table table-condensed">
                  <thead>
                      <tr>
                          <th>name</th>
                          <th>number</th>
                          <th>date</th>
                          <th>type</th>
                          <th>full cost</th>
                          <th>child</th>
                          <th>status</th>
                          <th>option</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $partysel = $db->query('SELECT * FROM booking ORDER BY bookingid DESC');
                      while ($ps = $partysel->fetch()) {
                          $status = ($ps['bookstatus'] == '0') ? 'pending' : 'validated';
                          $opt = ($ps['bookstatus'] == '0') ? 'val' : 'decl';
                          $txt = ($ps['bookstatus'] == '0') ? 'accept' : 'decline';
                          echo '<tr>
                            <td>'.$ps['customername'].'</td>
                            <td>'.$ps['Number'].'</td>
                            <td>'.$ps['BookingDate'].'</td>
                            <td>'.$ps['PartyBooked'].'</td>
                            <td>£'.$ps['fullcost'].'</td>
                            <td>'.$ps['amount_perchild'].'</td>
                            <td>'.$status.'</td>
                            <td>
                                <p>
                                    <a href="viewbookings.php?opt='.$opt.'&id='.$ps['bookingid'].'">'.$txt.'</a>
                                </p>
                                <p>
                                    <a href="viewbookings.php?opt=del&id='.$ps['bookingid'].'">delete</a>
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
