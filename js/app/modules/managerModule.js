define(['functions','loginController','headerController','userController','transportController','reportsController'],
function(functions,loginController,headerController,userController,transportController,reportsController){
  var managerModule = angular.module('managerModule',['ui.router','datatables','datatables.bootstrap']);

  managerModule.controller('loginController',loginController);
  managerModule.controller('headerController',headerController);
  managerModule.controller('userController',userController);
  managerModule.controller('transportController',transportController);
  managerModule.controller('reportsController',reportsController);
  managerModule.service('functions',functions);

  managerModule.config(function ($stateProvider,$urlRouterProvider){
      $stateProvider
              .state('home', {
                url: '/home',
                templateUrl: 'homes.php',
                controller: 'headerController'
                })
              .state('users', {
                url: '/users',
                templateUrl: 'users.php',
                controller: 'userController'
                })
              .state('transport', {
                url: '/transports',
                templateUrl: 'transport.php',
                controller: 'transportController'
              })
              .state('reports', {
                url: '/reports',
                templateUrl: 'reports.php',
                controller: 'reportsController'
              })

      $urlRouterProvider.otherwise('/home');

  });

  return managerModule;
});
