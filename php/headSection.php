<?php
/*
 * This just contains the entire head section... it keeps everything organized and automatically loads everything we need on each page.
 */
?>
<!DOCTYPE html>
<html>
<head lang="en" >
    <meta charset="UTF-8">
    <title></title>
    <link href="/Hospital-Scheduler/css/master.css" type="text/css" rel="stylesheet"/>
    <link href="/Hospital-Scheduler/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <script src="/Hospital-Scheduler/js/jquery.min.js"></script>
    <script src="/Hospital-Scheduler/js/bootstrap.min.js"></script>
    <!--Loading the angular from the website, I am having problems with getting it to load-->
    <script src="//code.angularjs.org/1.2.12/angular.js"></script>
    <script src="/Hospital-Scheduler/js/Controllers/controller.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
    <script src="/Hospital-Scheduler/js/master.js"></script>
</head>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="getCalendarData()">
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#get_data-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse" id="get_data-1">
            <ul class="nav navbar-nav">
                <li><a href="calendarView.php">Home Page</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calendar<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Weekly</a></li>
                        <li><a href="#">Monthly</a></li>
                        <li><a href="#">Yearly</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scheduler<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Add Appointment</a></li>
                        <li><a href="#">Remove Appointment</a></li>
                        <li><a href="#">Change Appointment</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admins Only<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Add Employee</a></li>
                        <li><a href="#">Remove Employee</a></li>
                        <li><a href="#">Change Employee</a></li>
                    </ul>
                </li>
                <li><a href="shiftView.php">Shift View</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>