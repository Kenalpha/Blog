<?php

session_start();

if (isset($_POST['submit'])) {
	//
	$user=$_POST["username"];
	$pwrd=$_POST["pwrd"];
	//include database connections
	include('../includes/db_connect.php');
	if (empty($user) || empty($pwrd)) {
		echo "<script> alert('Missing Information') </script>";
	} else {
		$user = test_input($user);
		$user = $db->real_escape_string($user);
		$pwrd = test_input($pwrd);
		$pwrd = $db->real_escape_string($pwrd);
        $pwrd = md5($pwrd); //password hashing
		$query = $db->query("SELECT user_id, username FROM user WHERE username='$user' AND password='$pwrd' ");
        if($query->num_rows ===1){
        	while($row = $query->fetch_object()){
        		$_SESSION['user_id'] = $row->user_id;//setting session value
        	}
        	header('Location: index.php');
        	exit();
        }else{
        	echo "Missing Information";
        }
	}

}

//security function
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel=icon href=../images/favicon.png>

  <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--End of bootstrap-->
	<title>Admin Login</title>
    <style type="text/css">
            body {
            background:#333;
            }
            .form_bg {
                background-color:#eee;
                color:#666;
                padding:20px;
                border-radius:10px;
                position: absolute;
                border:1px solid #fff;
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                width: 320px;
                height: 280px;
            }
            .align-center {
                text-align:center;
            }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="form_bg">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                 <h2 class="text-center">Admin Login</h2>
                <br/>
                <div class="form-group">
                    <input type="text" class="form-control" id="userid" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" name="pwrd" placeholder="Password">
                </div>
                <br/>
                <div class="align-center">
                    <button type="submit" class="btn btn-default" id="login" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>