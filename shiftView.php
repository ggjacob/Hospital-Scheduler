<?php
include_once "php/headSection.php";
?>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">
<?php
include_once "php/navBar.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12" ng-repeat="data in shifts">
            {{data.ID}}
            {{data.Start}}
            {{data.End}}
        </div>
    </div>
</div>