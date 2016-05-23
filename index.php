<?php

/*
 * THIS IS OUR ENTRY POINT
 */
include_once ('./config.php');
include_once ('./libs/db.lib.php');
include_once ('./layout/header.inc.php');

include_once ('./modules/' . $_GET['module'] . "/" . $_GET['action'] . ".inc.php");

include_once ('./layout/footer.inc.php');
