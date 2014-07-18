/*** *** *** *** *** ***
 * @package Team766-Attendance
 * @file    ajaxLoadSort.js
 * @start   Jul 14, 2014
 * @author  pjztam
 * @link    attendance.team766.com
 *** *** *** *** *** *** */

 $(document).ready(function() {
                
                $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleHoursDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescend');
                    $('#PageTitle').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescendTitle');

                $("#sortPeopleHoursDescend").click(function() {
                    $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleHoursDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescend');
                    $('#PageTitle').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescendTitle');

                });

                $("#sortPeopleIDDescend").click(function() {
                    $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleIDDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleIDDescend #sortPeopleIDDescend');
                    $('#PageTitle').load('admin_process.php?mod=sortPeopleIDDescend #sortPeopleIDDescendTitle');

                });

                $("#sortPeopleNameDescend").click(function() {
                    $( ".active" ).removeClass( "active" );
                    $( "li #sortPeopleNameDescend" ).parent().addClass( "active" );
                    $('#result').load('admin_process.php?mod=sortPeopleNameDescend #sortPeopleNameDescend');
                    $('#PageTitle').load('admin_process.php?mod=sortPeopleNameDescend #sortPeopleNameDescendTitle');

                });
            });

