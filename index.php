<?php

require_once "vendor/autoload.php";

if(isset($_GET['student']) && $_GET['student'] >= 1)
{
    $student = filter_var($_GET['student'],[FILTER_VALIDATE_INT]);
    \App\Controllers\HomeController::handleGrade($student);
}