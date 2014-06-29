<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendence
 * @file    main.class.php 
 * @start   Jun 27, 2014
 * @author  pjztam
 * @link    attendence.team766.com
 * ** *** *** *** *** *** */

/**
 * Holds main worker classes
 *
 * @author pjztam
 */
class main {
    function currentDate() {
        $mysql_date = date( 'Y-m-d H:i:s');
        return $mysql_date;
    }
}
