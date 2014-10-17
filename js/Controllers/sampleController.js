var personnelApp = angular.module('personnelApp', ['ngRoute']);
personnelApp.config(function ($routeProvider) {
    $routeProvider
        .when('/',
        {
            templateUrl: "js/Template/insertEvent.html",
            controller: "sampleCtrl"
        }
    )
})
//
personnelApp.controller("sampleCtrl",['$scope', '$http', function($scope, $http) {
    $scope.test = 'helloWorld';
    $scope.requestData = [];
    $scope.showData = '';

    //Makes the call to get the data from the DB
    $scope.getData = function() {
        $http.get('php/getInfo.php')
            .success(function (data) {

                console.log(data);
                $scope.requestData.push(data[0]);
                //console.log($scope.requestData);
                angular.forEach(data, function (value, key) {
                    console.log(value);
                   $scope.requestData.push(value);
                //
                //    // $scope.showData = "Good";
                });
            })
            .error(function(data){

            });
    };
    //The below call will first get OAUTH token and then insert event...
    //$scope.insertEvent = function(){
    //    $scope.startTime = $scope.Syear + '-' + $scope.Smonth +'-' + $scope.Sday;
    //    $scope.endTime = $scope.Eyear + '-' + $scope.Emonth +'-' + $scope.Eday;
    //    OAuth.initialize('kaPDpLc5yGB50KYF3gUEqSps0sk');
    //    OAuth.popup('google').done(function(result) {
    //        console.log(result);
    //        result.post('/calendar/v3/calendars/nau.edu_qqegsuokfju24hteng42eimm0c%40group.calendar.google.com/events', {
    //            data: JSON.stringify({
    //                end:{'date': $scope.startTime},
    //                start:{'date': $scope.endTime},
    //                summary: $scope.eventTitle
    //            }),
    //            headers: {'Content-Type': 'application/json; charset=UTF-8', 'X-JavaScript-User-Agent':  'Google APIs Explorer', dataType: "json"}
    //        })
    //            .done(function (response) {
    //                console.log(response);
    //            })
    //            .fail(function (err) {
    //                console.log( err);
    //            });
    //    })
    //}
}]);
