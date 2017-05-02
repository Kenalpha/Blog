<?php
session_start();
if(!isset($_SESSION['user_id'])){//this redirect the user to login page if they try to access it without logging in
	header('Location: login.php');
	exit();
}
include('../includes/db_connect.php');
//post count
$post_count = $db->query("SELECT * FROM posts");
//comment count
$comment_count = $db->query("SELECT * FROM comments");

if (isset($_POST['submit'])) {//if submit button is pressed...
    $newCategory = test_input($_POST['newCategory']);
    if (!empty($newCategory)) {
       $sql = "INSERT INTO categories (category) VALUES('".$newCategory."')";
       $query =$db->real_escape_string($sql);
       $query = $db->query($sql);
       if ($query) {
         echo "New category added";
       }else{
         echo "Error";
       }
    }else{
      echo "Missing newCategory";
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
        <li><a href="#" class="selected">Dashboard</a></li>
        <li><a href="new_post.php">Create New Post</a></li>
        <li><a href="../">Blog Home Page</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
  </div>

  <div class="content">
      <h1>Dashboard</h1>
      <p>You can manage everything from here</p>

   <div id="box">
   <div class="box-top">Current Posts and Comments</div>
   <div class="box-pane1">
      <table>
         <tr>
            <td>Total Blog Post</td>
            <td><?php echo $post_count->num_rows ?></td>
         </tr>
         <tr>
            <td>Total Comments</td>
            <td><?php echo $comment_count->num_rows ?></td>
         </tr>
      </table>
      <div id="categoryForm">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
           <div class="form-group"> 
            <label for="category">Add New Category</label><input type="text" name="newCategory" class="form-control"/>
           </div>
           <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
           </div>
          </form>
      </div>
   </div>
   </div>



  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>