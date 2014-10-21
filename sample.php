<?php
include_once "php/headSection.php";
?>
<!--The head section can be found in the headSection.php file-->
<body  ng-app="personnelApp" ng-controller="sampleCtrl">
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
                <li><a href="../homepage.html">Home Page</a></li>
                <li class="dropdown">
                    <a href="calendar_default.html" class="dropdown-toggle" data-toggle="dropdown">Calendar<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="../calendar_weekly.html">Weekly</a></li>
                        <li><a href="../calendar_monthly.html">Monthly</a></li>
                        <li><a href="../calendar_yearly.html">Yearly</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scheduler<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="../add_appt.html">Add Appointment</a></li>
                        <li><a href="../remove_appt.html">Remove Appointment</a></li>
                        <li><a href="../change_appt.html">Change Appointment</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admins Only<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="../add_appt.html">Add Employee</a></li>
                        <li><a href="../remove_appt.html">Remove Employee</a></li>
                        <li><a href="../change_appt.html">Change Employee</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.html">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col-sm-6 col-sm-push-3 text-center">
        <h3>Web Technology Demonstration</h3>
    </div>
    <div class="col-sm-12 text-center">
        <button class="btn btn-danger" type="submit" ng-click="getData()">Show All Employees</button>
    </div>
    <div class="col-sm-12 text-center" style="margin-top: 10px;">
        <button class="btn btn-info calendarTable" type="submit">Show Calendar</button>
    </div>
    <div class="col-sm-12 text-center" style="margin-top: 10px;">
        <button class="btn btn-info" type="submit"   data-toggle="modal" data-target="#myModal">Add Calendar Event</button>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-2" ng-repeat="data in requestData">
            {{data.EMPLOYEE_FNAME}}
        </div>

    </div>
</div>




<!--The below calls two partial templates-->
<div ng-include="'js/Template/dataTable.tpl.html'"></div>
<div ng-include="'js/Template/calendarData.tpl.html'"></div>
<!-- This will call the modal template -->
<div ng-view></div>


</body>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
</html>