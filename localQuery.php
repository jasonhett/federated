<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jjbeanz
 * Date: 4/25/14
 * Time: 5:21 PM
 * To change this template use File | Settings | File Templates.
 */

$COMMA = ",";
$query = $_GET['q'];
$error = '0,';
$result;

// Create connection
$con=mysqli_connect("localhost","proj2user","proj2pass","federated");

// Check connection
if (mysqli_connect_errno())
{
    $error =  "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

    if (!mysqli_query($con,$query))
    {
        $error = "Error description: " . mysqli_error($con);
        print_r($error);
    } else {
        $results = mysqli_query($con,$query);
        $return_value = $error;
        print_r($return_value);
        while($row = mysqli_fetch_array($results))
        {
            $return_value = "";
            for($i=0; $i<count($row); $i++){
                $return_value .= $row[$i]." ";
            }
            print_r($return_value);
            print $COMMA;
        }
    }
}

//Free the memory
mysqli_free_result($result);

//Close the connection.
mysql_close($con);