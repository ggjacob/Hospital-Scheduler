var calendarApp = angular.module('calendarApp', ['ngRoute']);
/*personnelApp.config(function ($routeProvider) {
    $routeProvider
        .when('/',
        {
            templateUrl: "js/Template/insertEvent.html",
            controller: "sampleCtrl"
        }
    )
})*/
//
calendarApp.controller("sampleCtrl",['$scope', '$http', function($scope, $http) {
    $scope.test = 'helloWorld';
    $scope.requestData = [];
    $scope.showData = '';
    $scope.testData = [];

    //Makes the call to get the data from the DB
    $scope.getData = function() {
        $http.get('php/getInfo.php')
            .success(function (data) {

                angular.forEach(data, function (value, key) {
                    console.log(data);
                    //Split the shift/day JSON data into a list with the javascript split function
                    value.Day = (value.Day).split(",");
                    value.Shift = (value.Shift).split(",");


                    //Check if we have shifts on any of those days
                    //Really, we could do this multiple ways but I chose to check the Day and then change the shift.
                    if(value.Day.length === 1){
                        if(value.Day[0] === "Monday"){
                            $scope.testData[0] = value.Shift[0];
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';

                        }
                        else if(value.Day[0] === "Tuesday"){
                            $scope.testData[0] = '';
                            $scope.testData[1] = value.Shift[0];
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if(value.Day[0] === "Wednesday"){
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = value.Shift[0];
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if(value.Day[0] === "Thursday"){
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = value.Shift[0];
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if(value.Day[0] === "Friday"){
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = value.Shift[0];
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if(value.Day[0] === "Saturday"){
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = value.Shift[0];
                            $scope.testData[6] = '';
                        }
                        else if(value.Day[0] === "Sunday"){
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = value.Shift[0];
                        }
                    }
                    else{
                        if(value.Day[0] != "Monday"){
                            $scope.testData[0] = '';
                        }
                        else{
                            $scope.testData[0] = value.Shift[0];
                        }
                        if(value.Day[1] != "Tuesday"){
                            $scope.testData[1] = '';
                        }
                        else{
                            $scope.testData[1] = value.Shift[1];
                        }
                        if(value.Day[2] != "Wednesday"){
                            $scope.testData[2] = '';
                        }
                        else{
                            $scope.testData[2] = value.Shift[2];
                        }
                        if(value.Day[3] != "Thursday"){
                            $scope.testData[3] = '';
                        }
                        else{
                            $scope.testData[3] = value.Shift[3];
                        }
                        if(value.Day[4] != "Friday"){
                            $scope.testData[4] = '';
                        }
                        else{
                            $scope.testData[4] = value.Shift[4];
                        }
                        if(value.Day[5] != "Saturday"){
                            $scope.testData[5] = '';
                        }
                        else{
                            $scope.testData[5] = value.Shift[5];
                        }
                        if(value.Day[6] != "Sunday"){
                            $scope.testData[6] = '';
                        }
                        else{
                            $scope.testData[6] = value.Shift[6];
                        }
                    }


                    //Adjusts the Shift array to our new data that we just made.
                    value.Shift[0] = $scope.testData[0];
                    value.Shift[1] = $scope.testData[1];
                    value.Shift[2] = $scope.testData[2];
                    value.Shift[3] = $scope.testData[3];
                    value.Shift[4] = $scope.testData[4];
                    value.Shift[5] = $scope.testData[5];
                    value.Shift[6] = $scope.testData[6];


                    //Send the data to the front side.
                    $scope.requestData.push(value);

                });
            })
            .error(function(data){

            });
    };
}]);
