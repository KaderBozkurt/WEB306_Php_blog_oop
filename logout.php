<?php
require_once ('includes/bootstrap.php');
require_once('header.php');
session_start();
session_destroy();
header("Location: index1.php");
