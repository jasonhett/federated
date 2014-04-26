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
    $regex = "/^.*(max|min|sum|avg)[(]([^)]*)[)]/";
    if(preg_match($regex, $query, $matches)){
        $result .= $matches[1];
    } else {
        //No aggregrate query, query all and put them together
        noAggregrate();
    }

    if(count($matches) == 3){

        switch ($matches[1]) {
            case "max":
                getMax($result, $matches[2], $con);
                break;
            case "min":
                getMin();
                break;
            case "sum":
                getSum();
                break;
            case "avg":
                getAvg();
                break;
        }
    } else {
        $result = "Incorrect syntax.";
    }



    print_r($result);
}

//Free the memory
mysqli_free_result($result);

//Close the connection.
mysql_close($con);

function getMax(&$result, $attribute, $con){
    $result .= "Got to get Max Function, ";

    $q1 = "select max($attribute) from customers";
    $q2 = "select max($attribute) from lexcustomers";
    $q3 = "select max($attribute) from loucustomers";
    $q4 = "select max($attribute) from padcustomers";
    $q5 = "select max($attribute) from cincustomers";

    $r1 = mysqli_query($con,$q1);
    $r2 = mysqli_query($con,$q2);
    $r3 = mysqli_query($con,$q3);
    $r4 = mysqli_query($con,$q4);
    $r5 = mysqli_query($con,$q5);

    $rw1 = mysqli_fetch_array($r1);
    $rw2 = mysqli_fetch_array($r2);
    $rw3 = mysqli_fetch_array($r3);
    $rw4 = mysqli_fetch_array($r4);
    $rw5 = mysqli_fetch_array($r5);

    $arr = array($rw1[0], $rw2[0], $rw3[0], $rw4[0], $rw5[0]);

    $result .= max($arr);

}
function getMin(){

}
function getSum(){

}
function getAvg(){

}
function noAggregrate(){

}