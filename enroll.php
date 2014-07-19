<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    enroll.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
?>

<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Team766 - Enroll</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">

        <style id="holderjs-style" type="text/css"></style>
    
        
        
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="assets/js/docs.min.js"></script>
    
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
        
        <form id='enrollform' class='form-signin' role='form' action='clockin_process.php' method='POST' accept-charset="UTF-8">
            <div id="result"></div>
            <h2>Enroll Student</h2>
            <input type='text' class="form-control" placeholder="Name" autofocus="autofocus" name='studentname' id='studentname' />
            <input type='text' class="form-control" placeholder="ID Number" name='studentid' id='studentid' />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enroll</button>
        </form>

      <script>
            $("#enrollform").submit(function(event) {

                event.preventDefault();

                 var $form = $( this ),
                    studentid = $form.find( "input[name='studentid']" ).val();
                    studentname = $form.find( "input[name='studentname']" ).val();
                var posting = $.post("enroll_process.php", {studentidjs: studentid, studentnamejs: studentname});

                posting.done(function(data) {
                    $("#result").empty().append(data);
                });
                $('#enrollform')[0].reset();
            });
        </script>



   
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
  
    


        <div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1404206879096">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1404206879096" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div></body></html>