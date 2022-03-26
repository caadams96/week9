<?php
session_start();
//function to validate the parallel arrays
function validate_arrays(){
    global $counties,$states,$members,$income;
    $ct_count=count($_SESSION['counties']);
    $st_count=count($_SESSION['states']);
    $m_count=count($_SESSION['members']);
    $i_count=count($_SESSION['incomes']);
    //if all arrays are parallel they will subtract out to 0
    $validate = ($ct_count+$st_count)-($m_count+$i_count);
    if($validate==0){
        return true;
    }
    else {return false;}
}
//function to find the number of households surveyed
function households_surveyed($param,$array){
    $length=count($array);
    $count=0;
    if(validate_arrays()==true){
        for($i=0;$i<=$length;++$i){
            if($array[$i]==$param){
                $count += 1;
            }
        }
        return $count;

    } else { return  "error"; }
}

$ohio = households_surveyed("Oh", $_SESSION['states']);
$hamilton = households_surveyed("Hamilton",$_SESSION['counties']);
$butler = households_surveyed("Butler",$_SESSION['counties']);
$kentucky = households_surveyed("Ky",$_SESSION['states']);
$boone = households_surveyed("Boone",$_SESSION['counties']);
$kenton = households_surveyed("Kenton",$_SESSION['counties']);

?>
<!---**********************************************************-->
<!-- Corey Adams -->
<!DOCTYPE html>
<html lang="en">
<!--HTML DOCUMENT-->
<head>
    <title>Census Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="form_style.css">-->
</head>

<body>
<table border="1" width="15%">
    <tbody>
        <tr><td colspan="2" align="center"> <b>Total Households Surveyed</b></td></tr>
        <tr><td><b> Ohio</b></td><td><?php echo $ohio."\thouse(s)";?></td></tr>
        <tr><td>--Hamilton </td><td><?php echo $hamilton."\thouse(s)";?></td></tr>
        <tr><td>--Butler</td><td><?php echo $butler."\thouse(s)"?></td></tr>
        <tr><td><b>Kentucky</b><td><?php echo $kentucky."\thouse(s)"?></td></tr>
        <tr><td>--Boone</td><td><?php echo $boone."\thouse(s)"?></td></tr>
        <tr><td>--Kenton</td><td><?php echo $kenton."\thouse(s)"?></td></tr>

    </tbody>

</table>
<br>
<button class="button" onclick="location.href='index.php'"> <p> Home</p> </button>
</body>