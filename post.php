<?php
 if (!isset($_GET['id'])) {
 	header('Location: index.php');
 	exit();
 }else{
 	$id = $_GET['id'];
 }

 include('includes/db_connect.php');
 if(!is_numeric($id)){
 	header('Location: index.php');
 }
 $sql = "SELECT title, body FROM posts WHERE post_id_no='$id'";
 $query = $db->query($sql);
 if ($query->num_rows !=1) {
 	header('Location: index.php');
 	exit();
 }

 if (isset($_POST['submit'])) {
 	 $email = test_input($_POST['email']);
 	 $name = test_input($_POST['name']);
 	 $comment = test_input($_POST['comment']);
 	 if ($email && $name && $comment) {
 	 	$email = $db->real_escape_string($email);
 	 	$name = $db->real_escape_string($name);
 	 	$id = $db->real_escape_string($id);
 	 	$comment = $db->real_escape_string($comment);
 	 	if ($addComment = $db->prepare("INSERT INTO comments(post_id, name, email_add, comment) VALUES (?,?,?,?)")) {
 	 		 $addComment->bind_param('ssss', $id, $name, $email, $comment); //'id' represent's post id since we got it from url
 	 		 $addComment->execute();
 	 		 echo "Thank you, your comment was added";
 	 		 $addComment->close();
 	 	}else{
 	 		echo "Error".$db->error;
 	 	}
 	 }else{
 	 	echo "Error";
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
  <link rel=icon href=images/favicon.png>
  <title>Kenalpha Blog</title>

  <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--End of bootstrap-->
   <style type="text/css">
       body{
          padding-top: 0px;
          padding-bottom: 40px;
          background-color: #bdc3c7;
       }

       #body_part{
           background-color: #ffffff;
       }
  </style>
	
</head>
<body>

<!--navivation bar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kenalpha Blog</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="index.php">Blog</a></li>
      <li class="active"><a href="#">Post</a></li>
    </ul>
  </div>
</nav>
  <!--End of navigation bar-->

<div id="body_part" class="container">
  <div id="post">
    <?php
      $row = $query->fetch_object();
      echo "<h2>".$row->title."</h2>";
      echo "<p>".$row->body."</p>";
      echo "<a href='index.php'><button class='btn btn-default'>Back<button></a>";
    ?>
  </div>
  <hr />

  <div id="Comments">
    <?php
      $query = $db->query("SELECT * FROM comments WHERE post_id='$id' ORDER BY comment_id DESC");
      while ($row = $query->fetch_object()): 
    ?>
    <div>
       <h5><?php echo $row->name ?></h5>
       <div class="well">
         <p><?php echo $row->comment ?></p>
       </div>
    </div>
    <?php endwhile; ?>
    </div>
  
  
  <hr />
  <div id="add-comments">
	 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id=$id" ?>" method="post">
	   <div class="form-group">
	     <label for="email">Email Address</label>
       <input type="email" name="email" class="form-control" / required>
	   </div>
     <div class="form-group">
	     <label for="name">Name</label>
       <input type="text" name="name" class="form-control"/ required>
	   </div>
	   <div class="form-group">
	     <label>Comment</label>
       <textarea name="comment" class="form-control" required></textarea>
	   </div>
	   <input type="hidden" name="post_id" value="<?php echo $id ?>" />
     <button type="submit" class="btn btn-default" name="submit">Submit</button>
	 </form>
  </div>
  <hr />

  </div>
</body>
</html>