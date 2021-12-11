<?php
require_once __DIR__ . '/controllers/loginCheckController.php';
require_once __DIR__ . '/controllers/ClientController.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Details</title>
    <?php
        require_once __DIR__ . "/include/templates/site-header.php";
    ?>
</head>

<body>
    <?php 
        if ($_SESSION['userType'] === 0) {
            include(__DIR__ . "/include/templates/navbar-loggedin-client.php");
        }
        if ($_SESSION['userType'] === 1) {
            include(__DIR__ . "/include/templates/navbar-loggedin-provider.php");
        }
        if ($_SESSION['userType'] === 2) {
            include(__DIR__ . "/include/templates/navbar-loggedin-agency.php");
        }
    ?>
        <div class="col-9">
            <div class="container pt-4">
                <main class="form-signin flex">
                    <?php echo isset($error); ?>
                    <h1 class="pb-4 text-center">Account Details</h1>
                    <form method="POST">
                        <input type="hidden" name="id_c" value="<?php echo $getdat['ClientContactID'];?>">
                        <div class="row mb-3">
                            <label name="NDISNumberLabel" for="Username" class="col-sm-2 col-form-label">NDIS Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="NDISNumberValue" name="NDISNumberValue" placeholder="NDIS Number" value="<?php echo $getdat['ClientNDISNumber'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="NameLabel" for="Name" class="col-2 col-form-label">Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="FirstNameTextbox" name="FirstNameTextbox" placeholder="First Name" value="<?php echo $getdat['FirstName'];?>">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="MiddleNameTextbox" name="MiddleNameTextbox" placeholder="Middle Name" value="<?php echo $getdat['MiddleName'];?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="LastNameTextbox" name="LastNameTextbox" placeholder="Last Name" value="<?php echo $getdat['LastName'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php
                                $dateofbirth = explode('-',$getdat['BirthDate']);
                            ?>
                            <label name="BirthDateLabel" for="BirthDateLabel" class="col-2 col-form-label">Date of Birth</label>
                            <div class="col-3">
                                <input type="text" class="form-control" id="BirthDay" name="BirthDay" placeholder="Birth Day" value="<?php echo $dateofbirth[2];?>">
                            </div>
                            <div class="col-3">   
                                <input type="text" class="form-control" id="BirthMonth" name="BirthMonth" placeholder="Birth Month" value="<?php echo $dateofbirth[1];?>">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="BirthYear" name="BirthYear" placeholder="Birth Year" value="<?php echo $dateofbirth[0];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="AddressLabel" class="col-2 form-label">Address</label>
                            <div class="col-3">
                                <input type="text" class="form-control" id="UnitNumberTextBox" name="UnitNumberTextBox" placeholder="Unit Number" value="<?php echo $getdat['UnitNumber'];?>">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" id="StreetNumberTextBox" name="StreetNumberTextBox" placeholder="Street Number" value="<?php echo $getdat['StreetNumber'];?>">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" id="StreetNameTextbox" name="StreetNameTextbox" placeholder="Street Name" value="<?php echo $getdat['StreetName'];?>">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" id="StreetTypeTextBox" name="StreetTypeTextBox" placeholder="Street Type" value="<?php echo $getdat['StreetType'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="" for="" class="col-2 col-form-label"></label>
                            <div class="col-3">
                                <input type="text" class="form-control" id="SuburbTextBox" name="SuburbTextBox" placeholder="Suburb Text" value="<?php echo $getdat['Suburb'];?>">
                            </div>
                            <div class="col-3">
                                <select name="StateDropBox" class="form-control">
                                    <option value="ACT" <?php if($getdat['State']=='ACT'){ echo 'selected';}?>>ACT</option>
                                    <option value="NSW" <?php if($getdat['State']=='NSW'){ echo 'selected';}?>>NSW</option>
                                    <option value="NT" <?php if($getdat['State']=='NT'){ echo 'selected';}?>>NT</option>
                                    <option value="QLD" <?php if($getdat['State']=='QLD'){ echo 'selected';}?>>QLD</option>
                                    <option value="SA" <?php if($getdat['State']=='SA'){ echo 'selected';}?>>SA</option>
                                    <option value="TAS" <?php if($getdat['State']=='TAS'){ echo 'selected';}?>>TAS</option>
                                    <option value="VIC" <?php if($getdat['State']=='VIC'){ echo 'selected';}?>>VIC</option>
                                    <option value="WA" <?php if($getdat['State']=='WA'){ echo 'selected';}?>>WA</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="PostcodeTextBox" name="PostcodeTextBox" placeholder="Postcode" value="<?php echo $getdat['Postcode'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="Email1Label" for="Email1Label" class="col-sm-2 col-form-label">Email 1</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="Email1TextBox" name="Email1TextBox" placeholder="Email 1" value="<?php echo $getdat['Email1'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="Email2Label" for="Email2" class="col-sm-2 col-form-label">Email 2</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="Email2TextBox" name="Email2TextBox" placeholder="Email 2" value="<?php echo $getdat['Email2'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="MobilePhoneLabel" for="MobilePhone" class="col-sm-2 col-form-label">Mobile Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="MobilePhoneTextbox" name="MobilePhoneTextbox" value="<?php echo $getdat['MobilePhone'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="HomePhoneLabel" for="HomePhone" class="col-sm-2 col-form-label">Home Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="HomePhoneTextBox" name="HomePhoneTextBox" placeholder="Home Phone" value="<?php echo $getdat['HomePhone'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="PreferredContactLabel" for="PreferredContactLabel" class="col-sm-2 col-form-label">Preferred Contact</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="PreferredContactTextBox" name="PreferredContactTextBox" placeholder="Preferred Contact" value="<?php echo $getdat['PreferredContact'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="SecurityQuestionLabel" for="SecurityQuestion" class="col-sm-2 col-form-label">Security Question</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="SecurityQuestionTextBox" name="SecurityQuestionTextBox" placeholder="Security Question" value="<?php echo $getdat['SecurityQuestion'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="CommencementDateLabel" for="CommencementDateLabel" class="col-sm-2 col-form-label">Joined Manage Care</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="CommencementDateValue" name="CommencementDateValue" value="<?php echo date('Y-m-d', strtotime($getdat['CommencementDate']));?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="AggregateRatingLabel" for="AggregateRatingLabel" class="col-sm-2 col-form-label">Aggregate Rating</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="AggregateRatingLabelValue" name="AggregateRatingLabelValue" placeholder="Aggregate Rating" value="<?php echo $getdat['AggregateRating'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label name="NumberofRatingsLabel" for="NumberofRatingsLabel" class="col-sm-2 col-form-label">Number of Ratings</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="NumberOfRatingsLabelValue" name="NumberOfRatingsLabelValue" placeholder="Number Of Ratings" value="<?php echo $getdat['NumberOfRatings'];?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-center" name="UpdateDetailsButton" value="update" onclick="return confirm('Are you sure you want to update your details?')">Update Details</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
</body>
<?php
require_once __DIR__ . "/include/templates/sit-js.php";
?>
<script>
        /*!
         * Copyright (C) 2017 ProgrammersNG.  All rights reserved.
         * This file is an original work developed by ProgrammersNG
         */


        //Calender start

        //Date method
        function dates(tags) {

            if (tags == '')
            //If the dates('') paramenter is empty, add no tags
            {
                var dates = "";
                var i;
                for (i = 1; i < 32; i++) {
                    dates += i;
                }
            } else
            //If the dates('option') has paramenter, add the tags to it
            {
                var dates = "";
                var i;
                for (i = 1; i < 32; i++) {
                    dates += "<" + tags + ">" + i + "</" + tags + ">";
                }
            }

            //You can call the class multiple times                     
            var multiple_list = document.getElementsByClassName("bear-dates");
            for (i = 0; i < multiple_list.length; i++) {
                multiple_list[i].innerHTML = dates;
            }
        }




        //Days method
        function days(tags) {
            //List all the Days with array
            var list_days = [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ];

            if (tags == '')
            //If the days('') paramenter is empty, add no tags
            {
                var i;
                for (i = 0, l = list_days.length, days = ""; i < l; i++) {
                    days += list_days[i];
                }
            } else
            //If the days('option') has paramenter, add the tags to it
            {
                for (i = 0, l = list_days.length, days = ""; i < l; i++) {
                    days += "<" + tags + ">" + list_days[i] + "</" + tags + ">";
                }
            }

            //You can call the class multiple times                     
            var multiple_list = document.getElementsByClassName("bear-days");
            for (i = 0; i < multiple_list.length; i++) {
                multiple_list[i].innerHTML = days;
            }
        }



        //Short Days method
        function short_days(tags) {
            //List all the Days with array
            var list_days = [
                'Mon',
                'Tue',
                'Wed',
                'Thu',
                'Fri',
                'Sat',
                'Sun'
            ];

            if (tags == '')
            //If the short_days('') paramenter is empty, add no tags
            {
                var i;
                for (i = 0, l = list_days.length, days = ""; i < l; i++) {
                    days += list_days[i];
                }
            } else
            //If the days('option') has paramenter, add the tags to it
            {
                for (i = 0, l = list_days.length, days = ""; i < l; i++) {
                    days += "<" + tags + ">" + list_days[i] + "</" + tags + ">";
                }
            }

            //You can call the class multiple times                     
            var multiple_list = document.getElementsByClassName("bear-short-days");
            for (i = 0; i < multiple_list.length; i++) {
                multiple_list[i].innerHTML = days;
            }
        }



        //Months method
        function months(tags) {
            //List all the Days with array
            var list_months = [
                'January',
                'Febuary',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];

            if (tags == '')
            //If the months('') paramenter is empty, add no tags
            {
                var i;
                for (i = 0, l = list_months.length, months = ""; i < l; i++) {
                    months += list_months[i];
                }
            } else
            //If the months('option') has paramenter, add the tags to it
            {
                for (i = 0, l = list_months.length, months = ""; i < l; i++) {
                    months += "<" + tags + ">" + list_months[i] + "</" + tags + ">";
                }
            }

            //You can call the class multiple times                     
            var multiple_list = document.getElementsByClassName("bear-months");
            for (i = 0; i < multiple_list.length; i++) {
                multiple_list[i].innerHTML = months;
            }
        }



        //Short Months method
        function short_months(tags) {
            //List all the Months with array
            var list_months = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            if (tags == '')
            //If the short_months('') paramenter is empty, add no tags
            {
                var i;
                for (i = 0, l = list_months.length, months = ""; i < l; i++) {
                    months += list_months[i];
                }
            } else
            //If the months('option') has paramenter, add the tags to it
            {
                for (i = 0, l = list_months.length, months = ""; i < l; i++) {
                    months += "<" + tags + ">" + list_months[i] + "</" + tags + ">";
                }
            }

            //You can call the class multiple times                     
            var multiple_list = document.getElementsByClassName("bear-short-months");
            for (i = 0; i < multiple_list.length; i++) {
                multiple_list[i].innerHTML = months;
            }
        }




        //Year method
        function years(tags, startY, endY) {

            if (tags == '')
            //If the years('') paramenter is empty, add no tags
            {
                var years = "";
                for (i = startY; i < endY + 1; i++) {
                    years += i;
                }
            } else
            //If the years('option') has paramenter, add the tags to it
            {
                var years = "";
                for (i = startY; i < endY + 1; i++) {
                    years += "<" + tags + ">" + i + "</" + tags + ">";
                }
            }

            //You can call the class multiple times                     
            var multiple_list = document.getElementsByClassName("bear-years");
            for (i = 0; i < multiple_list.length; i++) {
                multiple_list[i].innerHTML = years;
            }
        }
        //Calender end
        dates('option');
        months('option');
        //You can change the startYear(1990) and endYear(2017)
        years('option', 1950, 2021);
    </script>
</html>