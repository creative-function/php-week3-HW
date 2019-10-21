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
    <h1>BAD REVIEWS</h1>
	<br>
	<a href="/">Back</a> ||
    <a href="single-rev.php">single reviews</a>
		<!-- href="/" is like "../", it causes the screen to "go back to index" by taking the extra url off -->
	<br>
	<br>

    <style>
    .form-group {
        display: block;
        margin: 20px;
    }
    .form-group label {
        display: inline-block;
        width: 150px;
        text-align: right;
        font-size: 0.85em;
        padding-right: 10px;
    }
    </style>
    <?php if (!isset($_POST['name'])):
        //if name field is posted, do this...
    ?>
    
    <form method="post">
        <div class="form-group">
            <label for="name-input" >
                What are you reviewing?
            </label>
            <input id="name-input" type="text" name="name" placeholder="Widgets">
        </div>
        <div class="form-group">
            <label for="select-input">
                What category is it in?
            </label>
            <select id="select-input" name="type">
                <option value="ipsums">Ipsums</option>
            </select>
        </div>
        <div class="form-group">
            <label for="text-input">
                What do you think of it?
            </label>
            <textarea id="text-input" name="content" placeholder="Write your review!"></textarea>
        </div>
        <div class="form-group">
        <label for="rate-input">
            Onascaleh....
        </label>
        <input  id="rate-input" type="radio" name="num" value="1" checked> 1
        <input  id="rate-input" type="radio" name="num" value="2"> 2
        <input  id="rate-input" type="radio" name="num" value="3"> 3
        <input  id="rate-input" type="radio" name="num" value="4"> 4
        <input  id="rate-input" type="radio" name="num" value="5"> 5
        <input  id="rate-input" type="radio" name="num" value="6"> 6
        <input  id="rate-input" type="radio" name="num" value="7"> 7
        <input  id="rate-input" type="radio" name="num" value="8"> 8
        <input  id="rate-input" type="radio" name="num" value="9"> 9
        <input  id="rate-input" type="radio" name="num" value="10"> 10
        
        <div class="form-group">
            <label for=" this label is for clear-fixing submit button to match other form boxes"></label>
            <input type="submit">
        </div>
    </form>
    <?php else:?>
                <!--
        1// ELSE (something has been submitted)
        2// do the database thing 
        3// echo "submission recieved" -->
        
        Something was posted here: 
        <?php print_r($_POST);
            //print the received array (user input)
        // echo "<br>";
        // echo 'name: ' . $_POST['name'];
        // echo "<br>";
        // echo 'content: ' . $_POST['content'];

        $new_name = $_POST['name'];
        $new_type = $_POST['type'];
        $new_content = $_POST['content'];
        $new_rating = $_POST['num'];
        
        $sql = "INSERT INTO reviews (name, type, content, rating) VALUES('$new_name','$new_type','$new_content','$new_rating')";
        $submission = mysqli_query($db,$sql);
            if ($submission){
                echo 'review submitted. Thanks, I guess.';
            } else {
                echo 'Error' . mysqli_error($db);
                //display error message 
            }
        ?>

       

    <?php endif;?>









	<?php
        // $sql = "SELECT * FROM reviews WHERE id= " . $_GET['id'];
		// $result= mysqli_query($db,$sql);
	?>

	</body>
</html>
