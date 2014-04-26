<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jjbeanz
 * Date: 4/25/14
 * Time: 9:50 PM
 * To change this template use File | Settings | File Templates.
 */

$COMMA = ",";
$query = $_GET['q'];
$error = '0,';
$result = "";

// Create connection
$con=mysqli_connect("localhost","proj2user","proj2pass","federated");

// Check connection
if (mysqli_connect_errno())
{
    $error =  "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    $result .= $error;
    $regex = "^\\s*select\\s+(max|min|sum|avg)\\s*\\((.+)\\)(.+)$";
    if(preg_match($regex, $query, $matches));
    foreach ($arr as &$value){
        $result .= $value;
    }
    print_r($result);
}


//Free the memory
mysqli_free_result($result);

//Close the connection.
mysql_close($con);