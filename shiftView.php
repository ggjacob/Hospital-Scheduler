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

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-default" data-toggle="modal" data-target="#myModal">
        Details
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Shift Details</h4>
                </div>
                <div class="modal-body">
                    This is where the details of the shift will go.
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="shiftstart">Shift Start:</label>
                            <input type="text" class="form-control" id="shiftstart" placeholder="Enter Shift Start Time">
                        </div>
                        <div class="form-group">
                            <label for="shiftend">Shift End:</label>
                            <input type="text" class="form-control" id="shiftend" placeholder="Enter Shift End Time">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
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