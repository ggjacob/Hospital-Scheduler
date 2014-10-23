<?php
include_once "php/headSection.php";
?>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">
<?php
include_once "php/navBar.php";
?>

<div class="container">
    <div class="row text-center" style="margin-bottom:30px;">
        <h2 style="border-bottom:1px solid lightgray">Current Shift Blocks</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <td>Shift ID</td>
                <td>Shift Start Time</td>
                <td>Shift End Time</td>
                <td></td>
            </thead>
            <tbody>
                <tr ng-repeat="data in shifts">
                    <td>{{data.ID}}</td>
                    <td>{{data.Start}}</td>
                    <td>{{data.End}}</td>
                    <td>Details</td>
                </tr>
            </tbody>
        </table>
    </div>
<!--    <div class="row" >-->
<!--        <div class="col-lg-4">-->
<!--            {{data.ID}}-->
<!--        </div>-->
<!--        <div class="col-lg-4">-->
<!--            {{data.Start}}-->
<!--        </div>-->
<!--        <div class="col-lg-4">-->
<!--            {{data.End}}-->
<!--        </div>-->
<!--    </div>-->
</div>