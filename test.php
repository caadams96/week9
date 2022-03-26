<?php
//session_start();
$_SESSION['states'] = array("Oh");
$_SESSION['counties'] = array("Hamilton");
$_SESSION['members'] = array(3);
$_SESSION['incomes'] = array(15000);
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
//use function CensusForm\poverty_percent;
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
        return ($count/$length)*100;
    }else {echo "!!Parallel Array Error!!<br>"; return  "ERROR"; }
}
var_dump($_SESSION['states']);
echo "<br>";
var_dump($_SESSION['counties']);
echo "<br>";
var_dump($_SESSION['members']);
echo "<br>";
var_dump($_SESSION['incomes']);
echo "<br>";
$arr = poverty_percent("Hamilton",$_SESSION['counties']);
var_dump($arr);
echo "<br>";
