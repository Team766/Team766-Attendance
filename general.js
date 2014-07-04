$(document).ready(function() {
    $('#content').load('test1.php');
    $('ul#nav li a').click(function() {
        var page = $(this).attr('href');
        $('#content').load(page + '.php');
        return false;
    });
});