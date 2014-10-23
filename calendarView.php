<?php
include_once "php/headSection.php";
?>
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