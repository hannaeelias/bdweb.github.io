<?php

include "datbaselink.php";

$book = ($_GET['boek']);

if(empty($book)){
    header('Location:/bdweb/pages\indexsearchtest.php');
}else{
    
    //create a query and does it
   
    $sql = "SELECT * FROM boek.booking WHERE name LIKE '%$book%'";
    $result = $conn->query($sql);


    // Check if a row was returned if yes that means there is a a correct boek 
    if ($result) {
        if (mysqli_num_rows($result) >= 1) {
            echo "search results for $book";
            echo "<br>";
            while($row = $result->fetch_assoc()) {
                echo "<div class='book'>";
                echo "<img src='" . $row["img_url"] . "' alt='Image'>";
                echo "<h2><a href='\bdweb\pages\bookresult.php?id=" . $row["usrid"] . "'>" . $row["name"] . "</a></h2>";
                echo"<br>";
                echo "</div>";
              }
        } else {
            echo"<br>";
            echo "niks gevonded";

        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}







$conn->close();  

?>