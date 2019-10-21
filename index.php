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

		<?php require 'database.php';
			// require adds the contents of the indicated file to the page ** and will not load the entire project if error is found
			// require_once is used to make sure the file/content is only added once  
		?>

		<div class="floating-box">
			<img class="logo" src="dist/img/logo.png" alt="Circus Logo">
			<div class="foreground">
				<h1>Reviewr 3.0!</h1>
				<p>We provide intergated reviews with cloud-based syndication for a more complexless and automated robotic takeover.</p>
				<h1>Ready to complain?</h1>
				<a href="create-review.php">WRITE A REVIEW!</a>
				<p>or select from the whine cooler:</p>
				<a href="sorted.php?id=<?php echo end($row['id']);?>">OLDEST|</a>
				<a href="sorted.php?id=<?php echo $row['id'];?>">NEWEST|</a>
				<a href="sorted.php?rating=<?php echo $row['rating'];?>">LOWEST|</a>
			</div>
			<div class="background"></div>
		</div>

		<!-- HOMEWORK QUESTIONS 
		1) redirect urls to dynamic data
		2) grab first or last element from array
		3) see all array elements, not just first result 
		(i.e what happnes when 2 reviews have the same rating?) -->

		<script src="dist/js/main.js"></script>
		<hr>
		<br>
		<h1> HOMEWORK</h1>

		<section class="hw1-4">
			<div class="hw1-2">
				<h2> list of complainers by nOObs: Newest to oldest:</h2>
				<span>====================</span>
				<?php
					$queryB = mysqli_query($db, "SELECT id, name FROM reviews ORDER BY id DESC");

					$results=mysqli_fetch_all($queryB, MYSQLI_ASSOC);
				?>

				<ul>
					<?php foreach ($results as $key => $row):?>	
					<li>
						<a href="single-rev.php?id=<?php echo $row['id'];?>">
						<!-- href="..." = echo each result ID# from the table
							so each link will have a unige ?var=# i.e ?id=1, ?id=2. etc... 
						-->
						<?php echo $row['name'];?> 
						</a>
					</li>
					<?php endforeach;?>
				</ul>
			</div>

			<div class="hw3-4">
				<h2> list of complainers by rating: highest to lowest:</h2>  
				<span>====================</span>			
				<?php
					$queryB = mysqli_query($db, "SELECT id, name, rating FROM reviews ORDER BY rating DESC");

					$results=mysqli_fetch_all($queryB, MYSQLI_ASSOC);
				?>

				<ul>
					<?php foreach ($results as $key => $row):?>	
					<li>
						<a href="sorted.php?rating=<?php echo $row['rating'];?>">
						<!-- href="..." = echo each result rating# from the table
							so each link will have a unige ?var=# i.e ?rating=1, ?rating=2. etc... 
						-->
						<?php echo $row['rating']."**** by: " . $row['name'];
		
						?> 
						</a>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
		</section>
	<hr>

	<?php include 'sorted.php';?>

	</body>
</html>


<!-- 
Week 3 - Extending your knowledge 

- Add a column to the database for "rating", type INT. Give the existing reviews a rating, 0-10 

- Add a set of radio buttons to the form, with values set to 0 through 10. You could also label them 0-10, or whatever you want, green through red, banana through brocolli, whatever makes sense to your reviews' subject matter. 


- Make the necessary modifications to the rest of the code to carry the 0-10 rating data through from the create-review form all the way through to the final single-review page 


- Change the query on the index page. You're adding an ORDER BY clause to make it order by the id column, but backwards, so the newest entries are at the top. 


- Now change it to order by rating, with the highest ratings at the top.

- Now see if you can make the ORDER BY clause dependent on a new GET variable. In order to test, you'll be manually changing the GET variable in the url. If the url has a GET variable along the lines of ?sort=rating, then order by the rating column. If it's ?sort=newest then put newest on top. If there's no get variable, leave off the order by clause so it's back to oldest on top. 


////last part///

- Now let's add links to the top of the page to go straight to these URLs. Something like "Sort by: Oldest first | Newest first | Rating"  -->
