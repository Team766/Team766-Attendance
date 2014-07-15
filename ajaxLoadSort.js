/*** *** *** *** *** ***
 * @package Team766-Attendance
 * @file    ajaxLoadSort.js
 * @start   Jul 14, 2014
 * @author  pjztam
 * @link    attendance.team766.com
 *** *** *** *** *** *** */

 $(document).ready(function() {
                
                $('#result').load('admin_process.php?mod=sortPeopleHoursDescend');

                $("#sortPeopleHoursDescend").click(function() {
                    $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleHoursDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleHoursDescend');

                });

                $("#sortPeopleIDDescend").click(function() {
                    $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleIDDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleIDDescend');

                });

                $("#sortPeopleNameDescend").click(function() {
                    $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleNameDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleNameDescend');

                });
            });

