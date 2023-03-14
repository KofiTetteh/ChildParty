<?php
if(isset($_POST['login']))
{
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

	$sql = "select * from customer where username ='$username' AND password = '$password'";
	$result = $db->query($sql);
    $r = $result->fetch();
    if(!empty($r)) {
        $_SESSION['id'] = $r['customerid'];
        $_SESSION['fn'] = $r['customername'];
        $_SESSION['em'] = $r['email'];
        $_SESSION['ad'] = $r['address'];
        if($r['Accesslevel'] === 'Admin')
        {
            header('location: addnewparty.php');
        }
        else {
            header('location: calendar.php');
        }
       die();
    } else {
		 echo "user does not exist";
	}
}
