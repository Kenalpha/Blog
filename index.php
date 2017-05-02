<?php
//connect to the database
 include('includes/db_connect.php');
//get record of database
 $record_count = $db->query("SELECT * FROM posts");
 //amount displayed
 $per_page = 4;
 //number of pages
 $pages = ceil($record_count->num_rows/$per_page);
 //get page number
 if (isset($_GET['p']) && is_numeric($_GET['p'])) {
 	$page = $_GET['p'];
 }else{
 	$page = 1;
 }
 if ($page<=0) {
 	 $start = 0;
 }else{
 	$start = $page * $per_page - $per_page;
 }
 $prev = $page - 1;
 $next = $page + 1;

 $query = $db->prepare("SELECT post_id_no, title, LEFT(body, 100) AS body, category FROM posts INNER JOIN categories ON categories.category_id=posts.category_id order by post_id_no desc limit $start, $per_page");
 $query->execute();
 $query->bind_result($post_id_no, $title, $body, $category);
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

  <script src="https://use.fontawesome.com/57c21d9eee.js"></script><!--linking for getting icons through CDN-->

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

       .body_part{
           background-color: #ffffff;
       }

       .post{
          padding: 15px 15px;
          border-bottom: 1px dotted #ccc;
       }

       img{
          -webkit-box-sizing: border-box; /*Safari chrome, other Webkit */
          -moz-box-sizing: border-box; /* Firefox, other Gecko */
          box-sizing: border-box; /* Opera/IE 8+ */
       }

       .widget h3{
           display: block; background: #212121; color: #f1f1f1; text-transform: capitalize; border-radius: 5px; margin-bottom: 10px; text-align: center; padding: 0px 0px;
      }

      .feat-img img {padding: 5px; border: 1px solid #ccc;}

      .post:first-of-type{padding-top: 0px;}
      .widget ul{margin-left: 0px;}
      .widget ul li {list-style: none; font-size: 14px;}
      .widget ul li a {display: block; padding: 5px 0px; color:  #888; border-top: 1px dotted #ccc;}
      .widget ul li a:hover{background: : #fff; text-decoration: none; padding-left: 5px;}
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
      <li class="active"><a href="#">Blog</a></li>
    </ul>
  </div>
</nav>
  <!--End of navigation bar-->

 <div class="container">

 <!--Begining of Carousel--> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Begining of slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/1.png" alt="Fast and furious 6">
    </div>

    <div class="item">
      <img src="images/2.png" alt="Fast and furious 6">
    </div>

    <div class="item">
      <img src="images/3.png" alt="Fast and furious 6">
    </div>

    <div class="item">
      <img src="images/4.png" alt="Fast and furious 6">
    </div>

    <div class="item">
      <img src="images/5.png" alt="Fast and furious 6">
    </div>
  </div>
  <!--End of slides-->

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <!--End of Carousel-->
  </div>
 
 <div class="container">
 <div class="body_part">
 <div class="row">
 <div class="col-sm-8">
   
  <!-- Left-aligned media object -->
  <div><!--Begining of post-->
    <?php
     while($query->fetch()):
     $lastspace = strrpos($body, ' ');
    ?>
  <div class="post">
  <div class="row">
    <div class="feat-img span2">
      <div class="media">
        <div class="media-left">
          <img src="images/anonymous.png" class="media-object" style="width:160px">
        </div>
        <div class="media-body">
          <h2 class="media-heading"><?php echo $title ?></h2>
          <p>
            <p><?php echo substr($body, 0, $lastspace)."<a href='post.php?id=$post_id_no'> ...</a>" ?></p>
            <p>Category: <?php echo $category ?></p>
          

           </p>
        </div>
        <?php echo "<a class='btn btn-default pull-right' href='post.php?id=$post_id_no' >Read more</a>" ?>
      </div>
    </div>
  </div>
  </div><!--end post row-->
  <?php endwhile ?>
  </div><!--end of post-->
  <hr />

 </div><!--end of column-->

 <aside class="col-sm-4"><!--aside div-->
  <div class="row">
    <div class="widget span4">
      <h3>Popular</h3>
      <p>
        <h4>Self Driving Car</h4>
        <a href="http://fortune.com/2016/02/10/google-self-driving-cars-artificial-intelligence/">
          <img class="img-responsive" src="images/selfdriving.png" title="Widget image" alt="Image" />
        </a>
      </p>
      </div>
    
    <div class="widget span4">
      <h3>Places</h3>
       <ul>
         <li><a href="#">Home</a></li>
         <li><a href="#">Blog</a></li>
       </ul>
    </div>
  </div>
 </aside><!--end of aside-->

 </div><!--end of row-->
 <div class="row">
  <ul class="pager">
  <?php
    if ($prev > 0) {
      echo "<li><a href='index.php?p=$prev'>Prev</a></li>";
    }
    if ($page < $pages) {
      echo "<li><a href='index.php?p=$next'>Next</a></li>";
    }
  ?>
  </ul>
 </div>
</div><!--overall content div-->
 
 <hr>
 <footer>
   <p>&copy; Kenalpha 2017</p>
 </footer>
 </div><!--end of container-->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
