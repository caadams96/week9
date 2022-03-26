<?php
session_start();
//function to find the average income
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
function avg_income($param,$array){

    $length = count($array);
    if(validate_arrays()==true){
        $sum=0;
        $count=0;
        for($i=0;$i<=$length;++$i){
            if($array[$i] == $param){
                $sum += $_SESSION['incomes'][$i];
                $count+=1;
            }
        }
        if($count!=0){
            return $sum/$count;
        }else return 0;

    }else {echo "!!Parallel Array Error!!<br>"; return  "error"; }
}
$ohio = avg_income("Oh", $_SESSION['states']);
$hamilton = avg_income("Hamilton",$_SESSION['counties']);
$butler = avg_income("Butler",$_SESSION['counties']);
$kentucky = avg_income("Ky",$_SESSION['states']);
$boone = avg_income("Boone",$_SESSION['counties']);
$kenton = avg_income("Kenton",$_SESSION['counties']);

?>
<!---**********************************************************-->
<!-- Corey Adams -->
<!DOCTYPE html>
<html lang="en">
<!--HTML DOCUMENT-->
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="form_style.css">-->
</head>

<body>
<table border="1" width="15%">
    <tbody>
        <tr><td colspan="2" align="center"> <b>Average Households Income</b></td></tr>
        <tr><td><b> Ohio</b></td><td><?php echo $ohio;?></td></tr>
<tr><td>--Hamilton </td><td><?php echo $hamilton;?></td></tr>
<tr><td>--Butler</td><td><?php echo $butler?></td></tr>
<tr><td><b>Kentucky</b><td><?php echo $kentucky?></td></tr>
<tr><td>--Boone</td><td><?php echo $boone?></td></tr>
<tr><td>--Kenton</td><td><?php echo $kenton?></td></tr>

</tbody>

</table>
<br>
<button class="button" onclick="location.href='index.php'"> <p> Home</p> </button>
</body>