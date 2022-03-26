<?php
//namespace CensusForm;
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
//function to find the percent of houses in poverty
function poverty_percent($param,$array){
    $length=0;
    //for each value inside array
    //add 1 to length
    foreach ($array as $value){
        if($value==$param){
            $length += 1;
        }
    }
    //count the size of the array
    $arr_len=count($array);
    //if the arrays are parallel continue
    if(validate_arrays()==true){
        $count=0;
        //if household are in poverty add to count
        for($i=0;$i<=$arr_len;++$i){
            if($array[$i]==$param && $_SESSION['incomes'][$i] < 12000 && $_SESSION['members'][$i] ==1){
                $count+=1;
            } if($array[$i]==$param && $_SESSION['incomes'][$i] < 18000 && $_SESSION['members'][$i] ==2){
                $count+=1;
            } if($array[$i]==$param && $_SESSION['incomes'][$i] < 25000 && $_SESSION['members'][$i] ==3){
                $count+=1;
            } if($array[$i]==$param && $_SESSION['incomes'][$i] < 30000 && $_SESSION['members'][$i] ==4){
                $count+=1;
            } elseif($array[$i]==$param && $_SESSION['incomes'][$i] < 40000 && $_SESSION['members'][$i] >=5){
                $count+=1;
            }
        }
        if($count != 0){return ($count/$length)*100; }
        else return 0;

    }else { return  "ERROR"; }
}
$ohio = poverty_percent("Oh",$_SESSION['states']);
$hamilton = poverty_percent("Hamilton",$_SESSION['counties']);
$butler = poverty_percent("Butler",$_SESSION['counties']);
$kentucky = poverty_percent("Ky",$_SESSION['states']);
$boone = poverty_percent("Boone",$_SESSION['counties']);
$kenton = poverty_percent("Kenton",$_SESSION['counties']);

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
        <tr><td colspan="2" align="center"> <b>Count of Households in Poverty</b></td></tr>
        <tr><td><b> Ohio</b></td><td><?php echo $ohio;?></td></tr>
        <tr><td>--Hamilton </td><td><?php echo $hamilton;?></td></tr>
        <tr><td>--Butler</td><td><?php echo $butler?></td></tr>
        <tr><td><b>Kentucky</b><td><?php echo $kentucky?></td></tr>
        <tr><td>--Boone</td><td><?php echo $boone?></td></tr>
        <tr><td>--Kenton</td><td><?php echo $kenton?></td></tr>

    </tbody>

</table>
<br>
<button class="button" onclick="location.href='CensusForm.php'"> <p> Home</p> </button>
</body>