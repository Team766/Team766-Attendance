<?php

/**
 * Created by PhpStorm.
 * User: pjztam
 * Date: 1/25/2015
 * Time: 6:45 PM
 */
class cache
{

    var $db;
    var $main;
    var $cache;
    var $cacheControl;

    function __construct()
    {
        require_once 'includes/db.class.php';
        require_once 'includes/main.class.php';
        require_once 'includes/admin.class.php';
        $this->db = new db();
        $this->main = new main();

        $this->cacheControl = $this->db->getCacheControl();
        $this->cache = $this->getCache();
    }

    function getCachedData()
    {
        return $this->cache;
    }

    function getCache()
    {
        $tempCache = array();
        for ($i = 0; $i < count($this->cacheControl); $i++) {
            $tempCache[$this->cacheControl[$i]['cacheName']] =
                $this->db->deCacheResource(
                    $this->cacheControl[$i]['datetime'],
                    $this->cacheControl[$i]['cacheName']);
        }
        if (!$this->isCacheValid($tempCache)) {
            new admin();
            $tempCache = $this->getCache();
        }
        return $tempCache;
    }

    function isCacheExpired()
    {
        $now = $this->main->currentDateTime();
        $cacheDateTime = new DateTime(
            $this->cacheControl['sortPeopleHoursDescend'],
            new DateTimeZone($this->main->getConfig()['timezone']));
        $timeDifference = $now->diff($cacheDateTime, TRUE);

        $epoch = new DateTime('@0');
        $epoch->add($timeDifference);
        return $epoch->getTimestamp() > 300;
    }

    function setLocalCache()
    {
        if ($this->isCacheExpired()) {
            new admin();
        }
        return $this->getCache();
    }

    function isCacheValid($tempCache)
    {
        for ($i = 0; $i < count($tempCache); $i++) {
            if ($tempCache[$i]['cachedResource'] == null) {
                return false;
            }
        }
        return true;
    }

}