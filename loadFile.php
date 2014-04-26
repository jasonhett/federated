<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jjbeanz
 * Date: 4/25/14
 * Time: 4:21 PM
 * To change this template use File | Settings | File Templates.
 */

$COMMA = ",";
$file = $_GET['f'];
$msg = 0;
$result;

// Create connection
$con=mysqli_connect("localhost","proj2user","proj2pass","federated");

// Check connection
if (mysqli_connect_errno())
{
    $msg =  "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    /* Attemp to load the csv file. It requires adjustment to meet the format of the infile.
    */
    $query =    "LOAD DATA LOCAL INFILE '$file' INTO TABLE customers FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES";

    if(!$results = mysqli_query($con,$query)){
        $msg = "Error description: " . mysqli_error($con);
    } else {
        $msg = "File Loaded Properly.";
    }

}

//Return the data back to the webpage.
print $msg.$COMMA;

//Free the memory
mysqli_free_result($result);

//Close the connection.
mysql_close($con);