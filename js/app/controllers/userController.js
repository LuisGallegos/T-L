/*
 @author: Luis Gallegos
 @version: 1.0
 This is the JavaScript File help us to send the values to the php files.
 */
 define([], function( ){
   return ['functions','$scope'],
   function(functions,$scope){
       var url = '../presenters/usersPresenter.php';

////// Set Rol Name on View
      $scope.getRolName = function (rol) {
         switch (rol) {
            case "1":
               return "Logistcs";
            case "2":
               return "Vigilant";
            case "3":
               return "Bus Manager";
         }
      }
/// Set Status on  view
      $scope.getStatus = function (rol) {
         switch (rol) {
            case "1":
               return "Active";
            case "0":
               return "Inactive";
         }
      }
///// Get All Users
      $scope.getUsers = function () {
          functions.async("POST",url,'getUsers').then(function (promise) {
             $scope.users = promise.data;
          });
      };
///// Get current Roles
      $scope.getRoles = function () {
          functions.async("POST",url,'getRoles').then(function (promise) {
             $scope.roles = promise.data;
          });
      };
//// Get only active users
      $scope.getUsersActives = function () {
         functions.async("POST",url,'getUsersActives').then(function (promise) {
           $scope.usersActives= promise.data;
         });
      };
/// INSERT new user
      $scope.newUser  = "";
      $scope.newUserPass  = "";
      $scope.newUserRole  = "";
      $scope.addUser = function () {
         if ($scope.newUser !== "" && $scope.newUserPass !== "" && $scope.newUserRole !== "") {
            var params = {};
            params.user = $scope.newUser;
            params.pass = $scope.newUserPass;
            params.rol = $scope.newUserRole;
            params = JSON.stringify(params);
            functions.async("POST",url,'addUser',params).then(function (promise) {
               if(promise.data == "true"){
                  swal("Good job!", "You add a new User!", "success");
                  $scope.newUser  = "";
                  $scope.newUserPass  = "";
                  $scope.newUserRole  = "";
                  $scope.getUsers();
                  $scope.getUsersActives();
               }else{
                  swal("Opps!!", "Something went wrong!","error");
                  console.log(promise.data);
               }
            });
         }else{
            swal("Opps!!", "Missing Fields","error");
         }
      };
//// DEACTIVATE User
      $scope.banUser = function (id) {
         functions.async("POST",url,'banUser',id).then(function (promise) {
            if (promise.data == "true") {
               swal("Good job!", "You banned this User!", "success");
               $scope.getUsers();
               $scope.getUsersActives();
            }else{
               swal("Opps!","Something went wrong!","error");
            }
         });
      };
//// UPDATE USER Activities
      $scope.validUserName = true;
      $scope.validPassword = true;
      $scope.validRol = true;
      $scope.validStatus = true;

      $scope.setIDandRol = function (id,rol) {
            $scope.idUpdateUser = id;
            $scope.validStatus = false;
            if (parseInt(rol) === 0) {
               $scope.updateUserStatus = 1;
            }else{
               $scope.updateUserStatus = 0;
            }
      };
//// Check if username field is empty in order to activate the button (modal)
      $scope.checkUsername = function () {
         if ($scope.updateUserName !== "" && $scope.updateUserName !== null && $scope.updateUserName !== undefined) {
            $scope.validUserName = false;
         }else{
            $scope.validUserName = true;
         }
      }
//// Check if password field is empty in order to activate the button (modal)
      $scope.checkPass = function () {
         if ($scope.updateUserPassword !== "" && $scope.updateUserPassword !== null && $scope.updateUserPassword !== undefined) {
            $scope.validPassword = false;
         }else{
            $scope.validPassword = true;
         }
      }
//// Check if password field is empty in order to activate the button (modal)
      $scope.checkRol = function () {
         if ($scope.updateUserRole !== "" && $scope.updateUserRole !== null && $scope.updateUserRole !== undefined) {
            $scope.validRol = false;
         }else{
            $scope.validRol = true;
         }
      }
////// Update User name
      $scope.updateUser = function () {
         var params = {};
         params.user = $scope.updateUserName;
         params.idUser = $scope.idUpdateUser;
         params = JSON.stringify(params);
         functions.async("POST",url,'setNewUserName',params).then(function (promise) {
            if (promise.data == "true") {
               swal("Good job!", "You change the username for this User!", "success");
               $scope.updateUserName = "";
            }else{
               swal("Opps!","Something went wrong!","error");
            }
         });
      }
////// Update Password
      $scope.updatePassword = function () {
         var params = {};
         params.password = $scope.updateUserPassword;
         params.idUser = $scope.idUpdateUser;
         params = JSON.stringify(params);
         functions.async("POST",url,'setNewPassword',params).then(function (promise) {
            if (promise.data == "true") {
               swal("Good job!", "You change the passoword for this User!", "success");
               $scope.updateUserPassword = "";
            }else{
               swal("Opps!","Something went wrong!","error");
            }
         });
      }
////// Update Role
      $scope.updateRole = function () {
         var params = {};
         params.role = $scope.updateUserRole;
         params.idUser = $scope.idUpdateUser;
         params = JSON.stringify(params);
         functions.async("POST",url,'setNewRole',params).then(function (promise) {
            if (promise.data == "true") {
               swal("Good job!", "You change the role for this User!", "success");
               $scope.updateUserRole = "";
            }else{
               swal("Opps!","Something went wrong!","error");
            }
         });
      }
////// Update Status
      $scope.updateStatus = function () {
         var params = {};
         params.status = $scope.updateUserStatus;
         params.idUser = $scope.idUpdateUser;
         params = JSON.stringify(params);
         functions.async("POST",url,'setNewStatus',params).then(function (promise) {
            if (promise.data == "true") {
               swal("Good job!", "You change the role for this User!", "success");
               $scope.validStatus = true;
            }else{
               swal("Opps!","Something went wrong!","error");
            }
         });
      };


       var init = function () {
          $scope.getUsers();
          $scope.getRoles();
          $scope.getUsersActives();
          functions.getSession();
       };

       init();
   }
 });
