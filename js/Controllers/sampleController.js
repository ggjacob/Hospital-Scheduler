
var personnelApp = angular.module('personnelApp', []);

personnelApp.controller("sampleCtrl",['$scope', '$http', function($scope, $http) {
    $scope.test = 'helloWorld';
    $scope.requestData = [];
    $scope.showData = '';
    $scope.getData = function() {
        $http.get('getInfo.php')
            .success(function (data) {
                console.log(data);
                //var array = angular.fromJson(data);
                //var parser = JSON.parse(data);
                angular.forEach(data, function (value, key) {
                    $scope.requestData.push(value);
                    $scope.showData = "Good";
                });
            })
            .error(function(data){

            });
    };
}]);