<?php
include_once "php/headSection.php";
?>
<body ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">
<?php
include_once "php/navBar.php";
?>

<script>
var newxhr1;
newxhr1 = new XMLHttpRequest;
newxhr1.open('GET', "Schedule.db", false);
newxhr1.send();
</script>
</head>

<body>
<script>
function grab_content("firstname", "lastname"){
	this.firstname = search.firstname;
	this.lastname = search.lastname;
	
	this.getarray = Schedule.db;
	
	return this.firstname + this.lastname;
}
</script>

<body>
<div ng-app="getApp">
	var getApp = angular.module("getApp", []);
	getApp.factory('', function(grab_content)){
	}

	<label>Find the employee desired:
	<div ng-controller="ShowFirstName">
		First Name <input class="form-control" type="text" ng-model="search.firstname"></br>
		{{search.firstname}}
	</div>
	
	
	<div ng-controller="ShowLastName">
	    Last Name <input class="form-control" type="text" ng-model="search.lastname"></br>
		{{search.lastname}}
	</div>
	</label>
	
	$filter('firstname')(array, $:enterfirstname, false)
	
	<div ng-repeat="i in Schedule | filter:simpleSearch" style="margin-top:50px;">
		{{i.firstname}}
		{{i.lastname}}
	</div>
	
	grab_content(search.firstname, search.lastname);
	
	<p>The first name is {{EMPLOYEE_FNAME}}</p>
	<p>The last name is {{EMPLOYEE_LNAME}}</p>

</div>
