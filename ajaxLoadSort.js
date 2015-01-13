/*** *** *** *** *** ***
 * @package Team766-Attendance
 * @file    ajaxLoadSort.js
 * @start   Jul 14, 2014
 * @author  pjztam
 * @link    attendance.team766.com
 *** *** *** *** *** *** */

$(document).ready(function () {

    $('#navHourList').css("display", "initial");
    $('#navHereList').css("display", "none");

    $(".active").removeClass("active");
    $("li #sortPeopleHoursDescend").parent().addClass("active");
    $('#result').load('html/loadSpinner.html #loading');
    $('#result').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescend');
    $('#PageTitle').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescendTitle');

    $("#sortPeopleHoursDescend").click(function () {
        $(".active").removeClass("active");
        $("li #sortPeopleHoursDescend").parent().addClass("active");
        $('#result').load('html/loadSpinner.html #loading');
        $('#result').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescend');
        $('#PageTitle').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescendTitle');

    });

    $("#sortPeopleIDDescend").click(function () {
        $(".active").removeClass("active");
        $("li #sortPeopleIDDescend").parent().addClass("active");
        $('#result').load('html/loadSpinner.html #loading');
        $('#result').load('admin_process.php?mod=sortPeopleIDDescend #sortPeopleIDDescend');
        $('#PageTitle').load('admin_process.php?mod=sortPeopleIDDescend #sortPeopleIDDescendTitle');

    });

    $("#sortPeopleNameDescend").click(function () {
        $(".active").removeClass("active");
        $("li #sortPeopleNameDescend").parent().addClass("active");
        $('#result').load('html/loadSpinner.html #loading');
        $('#result').load('admin_process.php?mod=sortPeopleNameDescend #sortPeopleNameDescend');
        $('#PageTitle').load('admin_process.php?mod=sortPeopleNameDescend #sortPeopleNameDescendTitle');

    });

    $("#clockedInStudents").click(function () {
        $(".active").removeClass("active");
        $("li #clockedInStudents").parent().addClass("active");
        $('#result').load('html/loadSpinner.html #loading');
        $('#result').load('admin_process.php?mod=clockedInStudents #clockedInStudents');
        $('#PageTitle').load('admin_process.php?mod=clockedInStudents #clockedInStudentsTitle');

    });

    $("#showHourList").click(function () {
        $('#navHourList').css("display", "initial");
        $('#navHereList').css("display", "none");
        $(".active").removeClass("active");
        $("li #sortPeopleHoursDescend").parent().addClass("active");
        $('#result').load('html/loadSpinner.html #loading');
        $('#result').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescend');
        $('#PageTitle').load('admin_process.php?mod=sortPeopleHoursDescend #sortPeopleHoursDescendTitle');

    });

    $("#showHereList").click(function () {
        $('#navHourList').css("display", "none");
        $('#navHereList').css("display", "initial");
        $(".active").removeClass("active");
        $("li #clockedInStudents").parent().addClass("active");
        $('#result').load('html/loadSpinner.html #loading');
        $('#result').load('admin_process.php?mod=clockedInStudents #clockedInStudents');
        $('#PageTitle').load('admin_process.php?mod=clockedInStudents #clockedInStudentsTitle');

    });

});

