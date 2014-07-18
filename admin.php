<?php
/* * * *** *** *** *** ***
 * @package Team766-Attendance
 * @file    admin.php 
 * @start   Jun 30, 2014
 * @author  pjztam
 * @link    Attendance.team766.com
 * ** *** *** *** *** *** */
//    require_once 'includes/admin.class.php';
//    $admin = new admin();
//    $all_students = $admin->sortStudentsAndHoursArray_HighScores();
//    echo '<table>';
//    for($i=0; $i<count($all_students); $i++) {
//        echo '<tr><td>' . $all_students[$i]['studentName'] . '</td><td>' . $all_students[$i]['studentID'] . '</td><td>' . $all_students[$i]['studentTime'] . '</td></tr>';
//    }
//    echo '</table>';
?>
<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Team766 - Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">

        <style id="holderjs-style" type="text/css"></style>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="assets/js/docs.min.js"></script>
        <script src="ajaxLoadSort.js"></script>

    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Team766-Attendance</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="clockin.php">ClockIn</a></li>
                        <li><a href="enroll.php">Enroll</a></li>
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="#">Overview</a></li>
                        <li><a href="#">Students</a></li>
                        <li><a href="#">Calendar</a></li>
                        <li><a href="#">Reports</a></li>
                    </ul>
                    
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div id="PageTitle"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a id="sortPeopleHoursDescend" href="#">Hours</a></li>
                        <li><a id="sortPeopleIDDescend" href="#">Student ID</a></li>
                        <li><a id="sortPeopleNameDescend" href="#">Name</a></li>

                    </ul>
                    <div id="result" style="clear:both;"></div>




                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->




        <div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1404206879096">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1404206879096" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div></body></html>