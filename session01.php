<?php
session_start();
$sid = session_id();

$_SESSION['name'] = 'makinose';
$_SESSION['love'] = 'udon';
$_SESSION['age'] = 12;
echo 'session TEST';
