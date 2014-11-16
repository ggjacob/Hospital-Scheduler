var calendarApp = angular.module('calendarApp', ['ngRoute', 'ngMessages', 'ngAnimate']);
/*calendarApp.config(function ($routeProvider) {
    $routeProvider
        .when('/',
        {
            templateUrl: "js/Template/insertEvent.html",
            controller: "sampleCtrl"
        }
    )
})*/
//


calendarApp.controller("controller",['$scope', '$http', '$filter', function($scope, $http, $filter) {
    $scope.requestData = [];
    $scope.showData = '';
    $scope.testData = [];
    $scope.formData = {};
    $scope.addShift = {};
    $scope.tableHeader = [];
    $scope.dateData = {};


function generateHeader (startDay,endDay){
    $scope.tableHeader.push(new Date(startDay * 1000));
    startDay = startDay * 1000;
    var oneDay = 24*60*60*1000;
    while($scope.tableHeader.length < 7){
        startDay += oneDay;
        $scope.tableHeader.push(new Date(startDay));
    }
    console.log($scope.tableHeader);
}

$scope.findMonday = function(){
    $scope.todayDate = $filter('date')(new Date(), "EEE");
    console.log($scope.todayDate);
    var oneDay = 24*60*60*1000;
    if($scope.todayDate != 'Mon'){
        $scope.testDate = new Date();
        $scope.testDate = Date.parse($scope.testDate);
       // console.log(new Date($scope.testDate));
       //$scope.todayDate = $filter('date')(new Date($scope.testDate), "EEE");
        while($scope.todayDate != 'Mon'){
            $scope.testDate -= oneDay;
            $scope.todayDate = $filter('date')(new Date($scope.testDate), "EEE");
        }
        var sevenDays = oneDay * 6;
        $scope.sevenDay = $scope.testDate + sevenDays;
        $scope.getCalendarData($scope.testDate/1000, $scope.sevenDay/1000);
    }
}

$scope.getCalendarData = function(startDay, endDay){
    generateHeader(startDay, endDay);
    $scope.dateData.startDate = $filter('date')(new Date(startDay * 1000), "yyyy-MM-dd");
    $scope.dateData.endDate= $filter('date')(new Date(endDay * 1000), "yyyy-MM-dd");
    $http({
        method: "POST",
        url: "php/getInfo.php",
        data: $.param($scope.dateData),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    })
        .success(function(data){
            console.log(data);
            angular.forEach(data, function(val){
                //Create new arrays to hold the data in.
                $scope.newDates = [];
                $scope.newShifts = [];
                //Split the data from the string they are in.
                val.date = (val.date).split(",");
                val.shift = (val.shift).split(",");
                //Set up variables to check the start day and end day
                //Also set a variable to account for one entire day.
                var oneDay = 24*60*60*1000;
                var startDay1 = startDay * 1000;
                var endDay1 = endDay * 1000;
                console.log(new Date(startDay1));
                console.log(new Date(endDay1));
                for(var i = 0; i < val.date.length; i ++){
                    var difference = 0;
                    var currentDate = Date.parse(val.date[i]) + oneDay;
                    //Check if there is only one item in the list.
                    if(val.date.length === 1){
                        var startDifference = Math.floor((currentDate - startDay1)/oneDay);
                        var endDifference =  Math.ceil((endDay1 - currentDate)/oneDay);
                        if(startDifference > 0 ){
                            $scope.newDates.push(new Date(currentDate));
                            $scope.newShifts.push('');
                            while(startDifference > 1){
                                currentDate = currentDate - oneDay;
                                $scope.newDates.push(new Date(currentDate));
                                $scope.newShifts.push('');
                                startDifference -= 1;
                            }
                            $scope.newDates.push(new Date(startDay1));
                            $scope.newShifts.push(val.shift[i]);
                            $scope.newDates = $scope.newDates.reverse();
                           // $scope.newShifts = $scope.newShifts.reverse();
                        }
                        currentDate = Date.parse(val.date[i]) + oneDay;
                        if(endDifference > 0){
                            while(endDifference > 0){
                                currentDate = currentDate + oneDay;
                                $scope.newDates.push(new Date(currentDate));
                                $scope.newShifts.push('');
                                endDifference -= 1;
                            }
                        }
                        else{
                            $scope.newShifts.push(val.shift[i]);

                            $scope.newDates.push(new Date(endDay1));
                        }
                    }

                    //Else there are more than one item.
                    else {
                        if (i == 0) {
                            console.log("curr" + new Date(currentDate));
                            console.log("start" + new Date(startDay1));
                            difference = Math.floor((currentDate - startDay1) / oneDay);
                            console.log(val.first_name + " " + difference);
                            if (difference > 0) {

                                $scope.newDates.push(new Date(currentDate));

                                while (difference > 1) {
                                    currentDate = currentDate - oneDay;
                                    $scope.newShifts.push('');
                                    $scope.newDates.push(new Date(currentDate));
                                    difference -= 1;
                                }
                                $scope.newShifts.push(val.shift[i]);
                                $scope.newDates.push(new Date(startDay1));

                                $scope.newDates = $scope.newDates.reverse();
                            }
                            else {
                                var secondDate = Date.parse(val.date[i + 1]) + oneDay;
                                difference = Math.ceil((secondDate - currentDate) / oneDay);

                                if (difference > 1) {
                                    $scope.newDates.push(new Date(currentDate));
                                    $scope.newShifts.push(val.shift[i]);
                                    while (difference > 1) {
                                        currentDate += oneDay;
                                        $scope.newShifts.push('');
                                        $scope.newDates.push(new Date(currentDate));
                                        difference -= 1;
                                    }
                                }
                                else {
                                    $scope.newShifts.push(val.shift[i]);
                                    console.log($scope.newShifts);
                                    $scope.newDates.push(new Date(currentDate));
                                }
                            }
                        }
                        else if(i == (val.date.length - 1)) {
                            currentDate = Date.parse(val.date[i]) + oneDay;
                            difference = Math.ceil((endDay1 - currentDate) / oneDay);
                            if (difference > 1) {
                                $scope.newShifts.push(val.shift[i]);
                                $scope.newDates.push(new Date(currentDate));
                                while (difference > 1) {
                                    currentDate = currentDate + oneDay;
                                    $scope.newShifts.push('');
                                    $scope.newDates.push(new Date(currentDate));
                                    difference -= 1;
                                }
                                $scope.newShifts.push('');
                                $scope.newDates.push(new Date(endDay1));

                            }
                            else {
                                $scope.newShifts.push(val.shift[i]);
                                $scope.newDates.push(new Date(endDay1));
                            }
                        }
                        else {
                            secondDate = Date.parse(val.date[i + 1]) + oneDay;
                            difference = Math.ceil((secondDate - currentDate) / oneDay);
                            if (difference > 1) {
                                $scope.newShifts.push(val.shift[i]);
                                $scope.newDates.push(new Date(currentDate));
                                while (difference > 1) {
                                    currentDate += oneDay;
                                    $scope.newShifts.push('');
                                    $scope.newDates.push(new Date(currentDate));
                                    difference -= 1;
                                }
                            }
                            else {
                                $scope.newShifts.push(val.shift[i]);
                                $scope.newDates.push(new Date(currentDate));
                            }
                        }
                    }
                }
                val.shift = $scope.newShifts;
                val.date = $scope.newDates;
                $scope.requestData.push(val);
            });

            console.log($scope.requestData);
        })
        .error(function(data){

        })

};

    $scope.shifts = {};
    $scope.getShifts = function () {
        $http.get('php/getShiftData.php')
            .success(function (data) {
                //Below will show the data being sent back from the php file.
                console.log(data);
                $scope.shifts = (data);

            })
            .error(function (data) {
            });
    };

    $scope.updateShifts = function() {
        console.log('here');
        $http({
            method: "POST",
            url: "php/updateShift.php",
            data: $.param($scope.formData),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            //Below will show the data being sent back from the php file.
            $scope.successMessage = "Update Successful";
            location.reload();

        })
            .error(function (data) {
            });
    }

    $scope.addNewShift = function() {
        $http({
            method: "POST",
            url: "php/addNewShift.php",
            data: $.param($scope.addShift),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            console.log(data);
            //Below will show the data being sent back from the php file.
            $scope.successMessage = "Update Successful";
            location.reload();
        })
            .error(function (data) {
            });
    }

    $scope.getShiftDetails = function(ID, startTime, endTime){
        $scope.formData.shiftID = ID;
        $scope.formData.shiftStart = startTime;
        $scope.formData.shiftEnd = endTime;
    }



    /*
    * Below is the demo data for the demo.php page. You can see that we have done this in two ways.
    * One way is using a JSON object and the other way is using just a plain, normal array.
    * As you can see, angular will handle the data almost the same on the front end.
    * */

    $scope.exampleData = {};
    $scope.exampleData = [
        {
            name: 'Duke'
        },
        {
            name: 'Kyle'
        },
        {
            name: 'Kris'
        },
        {
            name: 'Jarrin'
        },
        {
            name: 'Ryan'
        }
    ]

    $scope.exampleArray = [];
    $scope.exampleArray = ['Duke', 'Kyle', 'Kris', 'Jarrin', 'Ryan'];

}]);
