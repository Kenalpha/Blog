<?php
session_start();
include('../includes/db_connect.php');
if (!isset($_SESSION['user_id'])) {
	header('Location: login.php');
	exit();
}
if (isset($_POST['submit'])) {
	//get the blog data
	$title = test_input($_POST['title']);
	$body = test_input($_POST['body']);
	$category = test_input($_POST['category']);
	$title = $db->real_escape_string($title);
	$body = $db->real_escape_string($body);
	$user_id = $_SESSION['user_id'];
	$date = date('Y-m-d  G:i:s');
	if($title && $body && $category){
		$query = $db->query("INSERT INTO posts (user_id, title, body, category_id, posted) VALUES('$user_id', '$title', '$body', '$category', '$date')");
		if($query){
			echo "post added";
		}else{
			echo "Error";
		}
	}else{
		echo "Missing data";
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

<html> <!--Do not include <!DOCTYPE html> because it will break the page-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Kenalpha</title>
<link rel=icon href=../images/favicon.png>
<link rel="stylesheet" type="text/css" href="styles/global.css" />
<script src="scripts/jquery.js"></script>
<script src="scripts/general.js"></script>
<!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--End of bootstrap-->

</head>
<body>
<div id="header">
    <div class="logo"><a href="#">Ken<span>alpha</span></a></div>
</div> 

<a class="mobile" href="#">MENU</a>

<div id="container">
  <div class="sidebar">
      <ul id="nav">
        <li><a href="index.php" class="selected">Dashboard</a></li>
        <li><a href="#" class="selected">Create New Post</a></li>
        <li><a href="../">Blog Home Page</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
  </div>

  <div class="content">
      <h1>Create a new post</h1>
      <p>You create add a new post here</p>
     
   <div id="box">
   <div class="box-top">Create a new post here</div>
   <div class="box-pane1">

     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
       <div class="form-group">
        <label>Title:</label><input type="text" name="title" class="form-control" />
       </div>
       
       <div class="form-group">
        <label for="body">Body:</label>
       <textarea name="body" cols=50 rows=10 class="form-control"></textarea>
       </div>

       <div class="form-group">
        <label>Category:</label>
        <select name="category" class="form-control">
          <?php
             $query = $db->query("SELECT * FROM categories");
             while($row = $query->fetch_object()){
             	echo "<option value=' ".$row->category_id." '>".$row->category."</option>";
             }
          ?>
        </select>
       </div>
       <div class="form-group">
       <button type="submit" name="submit" class="btn btn-default" value="Submit">Submit</button>
       </div>
     </form>

  </div>
</div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>