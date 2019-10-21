<?php
    //ask the database to run this query
    //i.e GET ALL THE REVIEWS DATA

    $query = mysqli_query($db, "SELECT * FROM reviews");

    $all_reviews = mysqli_fetch_all($query, MYSQLI_ASSOC); //ASSOC shows given index names instead of index number

    echo "<ul>";
        foreach ($all_reviews as $i => $review){
           echo "<li>" . $review['name'] ."</li>";
         }
	echo "</ul>";
    

?>


