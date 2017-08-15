/*
 @author: Luis Gallegos
 @version: 1.0
 This is the JavaScript File help us to send the values to the php files.
 */
 define([], function( ){
   return ['functions','$scope'],
   function(functions,$scope){
       var url = '../presenters/headerPresenter.php';
      //  $scope.isLogistic = false;
      //  $scope.isVigilant = false;
      //  $scope.isEncargado = false;

       var init = function () {
         //  console.log(msg);// RETRIVED BY $_SESSION
         functions.getSession();
         //  $scope.$apply();
       };

       init();
   }
 });
