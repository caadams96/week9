<?php
namespace CensusForm;
header("location: index.php");
session_start();

function validate_integer($param){
    if(is_numeric($param)){
        return (integer) $param;
    }else{ return false;}

}
function string_splice($param,$string){
    $fields = explode(',',$string);
    if($param == "county"){
        return $fields[0];
    } else if ($param == "state"){
        return $fields[1];
    } else{ return false;  }
}

//
$counties = $_SESSION['counties'];
$county = string_splice("county", $_POST['county-choice']);
$states = $_SESSION['states'];
$state =  string_splice("state", $_POST['county-choice']);
$members = $_SESSION['members'];
$member = validate_integer($_POST['members']);
$incomes = $_SESSION['incomes'];
$income = validate_integer($_POST['income']);
//
if(isset($county)&&isset($state)&&isset($member)&&isset($income)){
    $counties[] = $county;
    $_SESSION['counties'] = $counties;
}
if(isset($county)&&isset($state)&&isset($member)&&isset($income)){
    $states[] = $state;
    $_SESSION['states'] = $states;
}
if(isset($county)&&isset($state)&&isset($member)&&isset($income)){
    $members[] = $member;
    $_SESSION['members'] = $members;
}
if(isset($county)&&isset($state)&&isset($member)&&isset($income)){
    $incomes[] = $income;
    $_SESSION['incomes'] = $incomes;
}
exit();
?>
<!--DEBUG SECTION-->
<!--back button used to get back to main page-->
<!DOCTYPE html>
<html lang="en">
<!--HTML DOCUMENT-->
<head>
    <title>Census Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="form_style.css">-->
</head>
<button class="button" onclick="location.href='index.php'">  Home </button>
<body></body>