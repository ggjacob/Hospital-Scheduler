<?php
include_once "php/headSection.php";
?>
<!--The head section can be found in the headSection.php file-->
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
                <li><a href="#">Home Page</a></li>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">
    <div class="row text-center">
        <h3 style="border-bottom:1px solid lightgray">Calendar View</h3>
    </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <td>Name</td>
                    <td>Monday</td>
                    <td>Tuesday</td>
                    <td>Wednesday</td>
                    <td>Thursday</td>
                    <td>Friday</td>
                    <td>Saturday</td>
                    <td>Sunday</td>
                </thead>
                <tbody>
                    <tr ng-repeat="data in requestData">
                        <td>{{data.Name}}</td>
                        <td ng-repeat="shifts in data.Shift track by $index">
                            {{shifts}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<!--The below calls two partial templates-->
<div ng-include="'js/Template/dataTable.tpl.html'"></div>
<div ng-include="'js/Template/calendarData.tpl.html'"></div>
<!-- This will call the modal template -->
<div ng-view></div>


</body>
</html>