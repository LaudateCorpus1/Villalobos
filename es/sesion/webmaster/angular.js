var app = angular.module("myNoteApp", []); 
app.controller("myNoteCtrl", function($scope) {
    $scope.noticia = " ";
    $scope.left  = function() {return $scope.noticia.length;};
    $scope.encabezado = " ";
    $scope.left2  = function() {return 250 - $scope.encabezado.length;};
  /*  $scope.clear = function() {$scope.message = "";};
    $scope.save  = function() {alert("Note Saved");};*/
}); 

