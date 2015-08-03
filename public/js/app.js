var app = angular.module( 'app', ['ngAnimate','ngMaterial','material.wizard'] );

app.controller("appController", function($scope) {
    $scope.submit = function (){
        console.log('Submit Data');
    };
    $scope.onExitStep1 = function (){
        console.log($scope.field1.val());
        console.log('step1 complete');
    }
});