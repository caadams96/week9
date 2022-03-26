<?php
namespace CensusForm;
session_destroy();
session_start();
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
<header>
    <div class="banner-wrapper">
        <div class="banner"> <h1> Census Form </h1> </div>
    </div>
</header>
<div class="back-drop">
    <main
    <form class="grid-wrapper"><!---------------------------------------------------------------->
        <div class="box1">
            <!-FORM-->
            <form action="CensusData.php" method="post">
        <table border="1" width="220px">
            <tr><td colspan="2"><b>Pick a County&State</b></td></tr>
            <tr><td><label>Select:</label><br> </td><td>
                    <select name="county-choice">
                        <option value="Hamilton,Oh" >Hamilton,Oh</option>
                        <option value="Butler,Oh" >Butler,Oh</option>
                        <option value="Boone,Ky" >Boone,Ky</option>
                        <option value="Kenton,Ky" >Kenton,Ky</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><b>Household Member Amount*</b></td></tr>
            <tr><td> Members:</td>
                <td><input type="text" name="members"  id="members"
                           value="<?php echo $_POST['members'];?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><b>Household Yearly Income*</b></td>
            </tr>
            <tr><td> Income:</td><td><input type="text" name="income"  id="income"
                                            value="<?php echo $_POST['income'];?>" required></td>
            </tr>
            <tr><td colspan="2" align="center">
                    <input type="submit" value="submit" name="submit">
                    <input type="reset" value="reset" name="reset">
                </td>
            </tr>
        </table>
        <br>
    </form>

        <table border="1">
            <tr><td><b>Controls</b></td></tr>
            <form action="ViewSurveyCount.php" method="post">
                <tr>
                    <td><input type="submit" value="Total Houses Surveyed" name="surveyed"></td>
                </tr>
            </form>

            <form action="ViewSurveyIncome.php" method="post" >
                <tr>
                    <td><input type="submit" value="Avg Household Income" name="income"></td>
                </tr>
            </form>
            <form action="ViewSurveyPoverty.php" method="post">
                <tr>
                    <td><input type="submit" value="Households Below Poverty" name="poverty"></td>
                </tr>
            </form>
        </table>

    </div>
</body>
</html>
