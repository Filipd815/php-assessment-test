<?php
// run this file when first running the application so all necessary databases and tables will be created
include 'includes/class-autoload.inc.php';

$dbh = new Dbh();

// create DB
$dbh->createDb();

// connect to DB
$dbh->connect();

// create tables
$dbh->createTables();