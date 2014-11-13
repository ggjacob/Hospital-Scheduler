<?php
include_once "php/headSection.php";
?>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">
<?php
include_once "php/navBar.php";
?>


<!--Start by creating a container to give a bit of cushion on the page.-->
<div class="container">

<!--    Here is an input field with an ng-model parameter attached to it.
 The ng-model is basically a variable that holds the data for this input field.-->
    <input class="form-control" type="text" ng-model="simpleSearch"/>
<!--    If you start to type in the input field, the data will actually show up just below it
because we have stated the angular variable below denoted in the double curly brackets.-->
    {{simpleSearch}}


<!-- We use ng-repeat to act as a for loop for data. In this case
we have a variable of type JSON that is holding data. We use the variable 'i'
as a placeholder to go through the data.-->
    <div ng-repeat = "i in exampleData | filter: simpleSearch">
<!-- The following is a representation of the placeholder and the specific json attribute that we want.
In this case, we want the attribute 'name' as defined in our JSON array.-->
        {{i.name}}
    </div>


<!--    Below is the same example except we are using an array to output the data. Feel free to play with this.-->


    <div ng-repeat="i in exampleArray | filter:simpleSearch" style="margin-top:50px;">
        {{i}}
    </div>

</div>


