<?php
include_once "php/headSection.php";
?>
<!--The head section can be found in the headSection.php file-->
<body  ng-app="personnelApp" ng-controller="sampleCtrl">

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





<!--The below calls two partial templates-->
<div ng-include="'js/Template/dataTable.tpl.html'"></div>
<div ng-include="'js/Template/calendarData.tpl.html'"></div>
<!-- This will call the modal template -->
<div ng-view></div>


</body>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
</html>