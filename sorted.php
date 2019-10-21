<?php require 'database.php';?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title> ¯\_(ツ)_/¯ </title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="dist/css/main.css">

	</head>
	<body>
	<br>
	<br>
	<a href="/">Back</a>
		<!-- href="/" is like "../", it causes the screen to "go back to index" by taking the extra url off -->
	|| <a href="create-review.php">WRITE A REVIEW</a>
	<br>
	<br>
	<?php
	if (isset($_GET['id'])):
		//if ?var is set in the url... 
        echo  "<h1>SHOWING REVIEWS  BY NooB:</h1>";
			// $_GET['sort'] = the variable set in the url using ?var 
				//i.e http://localhost:8888/single-rev.php?sort=newest
				//$_GET['sort'] = ?sort=newest [or whatever integer/variable user chooses]
		$sql = "SELECT * FROM reviews WHERE id= " . $_GET['id'];
			//$sql = an SQL command stored in a var:
				// select {all} from {reviews table} where {id} = 
				//+ whatever # {GETid} is in the url
		$result= mysqli_query($db,$sql);
			//query the {reveiwr database} for {this command} 
		$first_result = mysqli_fetch_array($result);
			//fetch the first result fro th returned array
		//print_r($first_result);
				//display the result on the page
		?>
        <hr>
        <h1>SHOWING REVIEWS  BY <?php echo 'SHOWING BY ID NUMBER: '. $_GET['id'];?></h1>
        <span>====================</span>
		<h2>Review of <?php echo $first_result['name'];?></h2>
		<h3>Category <?php echo $first_result['type'];?></h3>
		<p><?php echo $first_result['content'];?></p>
		<h3>Rating <?php echo $first_result['rating'];?></h3>
    <?php
        elseif (isset($_GET['rating'])):
		//if ?var is set in the url... 
        echo "<h1>SHOWING REVIEWS BY RATING:</h1>";
		//echo 'SHOWING BY RATING OF: '. $_GET['rating'];
			// $_GET['id'] = the variable set in the url using ?var 
				//i.e http://localhost:8888/single-rev.php?id=2
				//$_GET['id'] = ?id=2 [or whatever integer/variable user chooses]
		$sql = "SELECT * FROM reviews WHERE rating= " . $_GET['rating'];
			//$sql = an SQL command stored in a var:
				// select {all} from {reviews table} where {id} = 
				//+ whatever # {GETid} is in the url
		$result= mysqli_query($db,$sql);
			//query the {reveiwr database} for {this command} 
		$first_result = mysqli_fetch_array($result);
			//fetch the first result fro th returned array
		//print_r($result);
				//display the result on the page


        $queryB = mysqli_query($db, "SELECT id, name FROM reviews ORDER BY id DESC");

					$results=mysqli_fetch_all($queryB, MYSQLI_ASSOC);



     ?>
        <hr>
		<h3>Rating <?php echo $first_result['rating'];?></h3>
        <span>====================</span>
        <br>
        <h2>Review of <?php echo $first_result['name'];?></h2>
		<h3>Category <?php echo $first_result['type'];?></h3>
		<p><?php echo $first_result['content'];?></p>

	<?php else:?>
		SEE NEWEST | SEE TOP RATED 
	<?php endif; ?>
	</body>
</html>

