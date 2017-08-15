/*
 @author: Luis Gallegos
 @version: 1.0
 This is the JavaScript File help us to send the values to the php files.
 */
 define([], function( ){
   return ['functions','$scope','$q','$compile'],
   function(functions,$scope,$q,$compile,DTOptionsBuilder,DTColumnBuilder){
       var url = '../presenters/transportPresenter.php';

       $scope.transport = {
          folio : '',
          linea : '',
          tipo : '',
          placas : '',
          caja : '',
          responsable : '',
          comment  : ''
       };

       $scope.vm = this;
       $scope.vm.transports = {};
       $scope.vm.dtInstance = {};
       $scope.vm.dtOptions = DTOptionsBuilder.fromFnPromise(function () {
                     var defer = $q.defer();
                     functions.async("POST",url,'getTransports').then(function (promise) {
                        $scope.transports = promise.data;
                        var folioNewString = "M&S";
                        var value = $scope.transports[promise.data.length-1].folio.split("S");
                        var folio = parseFloat(value[1]) + 1;
                        var folioNew = "0000000" + folio;
                        if (folioNew.length > 7) {
                           var diff = folioNew.length - 7;
                           folioNew = folioNew.substring(diff);
                           folioNewString = folioNewString + folioNew;
                           $scope.transport.folio = folioNewString;
                        }
                        defer.resolve(promise.data);
                        //return promise.data;
                     })
                     return defer.promise;
                  })
                  .withOption('createdRow', createdRow)
                  .withBootstrap();

      $scope.vm.dtColumns = [
            DTColumnBuilder.newColumn('idtransport').withTitle('ID').withClass('text-danger'),
            DTColumnBuilder.newColumn('folio').withTitle('Folio'),
            DTColumnBuilder.newColumn('linea').withTitle('Linea'),
            DTColumnBuilder.newColumn('tipo').withTitle('Type'),
            DTColumnBuilder.newColumn('placas').withTitle('Placas'),
            DTColumnBuilder.newColumn('box_number').withTitle('Box Number'),
            DTColumnBuilder.newColumn('user').withTitle('Responsable'),
            DTColumnBuilder.newColumn('comments').withTitle('Comments'),
            DTColumnBuilder.newColumn('enter_date').withTitle('Enter'),
            DTColumnBuilder.newColumn('exit_date').withTitle('Exit'),
            DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable().renderWith(actionsHtml)
      ];

      function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
      }

      function actionsHtml(data, type, full, meta) {
           $scope.vm.transports[data.idtransport] = data;
           return '<button class="btn btn-success btn-circle" ng-click="enter('+ data.idtransport + ')">' +
               '   <i class="fa fa-sign-in"></i>' +
               '</button>&nbsp;'+
               '<button class="btn btn-warning btn-circle" ng-click="exit('+ data.idtransport + ')">' +
               '   <i class="fa fa-sign-out"></i>' +
               '</button>&nbsp;';
      }

      $scope.enter = function(id) {
           $scope.idUpdateTransport = id;
           functions.async("POST",url,'setTransportStart',id).then(function (promise) {
             if (promise.data == "true") {
               swal("Good job!", "You update the Start Date for this Transpoprt!", "success");
            }else{
               swal("Opps!","Something went wrong!","error");
            }
            $scope.vm.dtInstance.reloadData();
           });
      };

      $scope.exit = function(id) {
           $scope.idUpdateTransport = id;
           functions.async("POST",url,'setTransportEnd',id).then(function (promise) {
             if (promise.data == "true") {
               swal("Good job!", "You update the End Date for this Transpoprt!", "success");
            }else{
               swal("Opps!","Something went wrong!","error");
            }
            $scope.vm.dtInstance.reloadData();
           });
      };

      $scope.addTransport = function () {
         var params = $scope.transport;
         params = JSON.stringify(params);
         functions.async("POST",url,'insertTrasport',params).then(function (promise) {
           if (promise.data == "true") {
             swal("Good job!", "You create a new Transpoprt!", "success");
          }else{
             swal("Opps!","Something went wrong!","error");
          }
          $scope.transport = {
             folio : '',
             linea : '',
             tipo : '',
             placas : '',
             caja : '',
             responsable : '',
             comment  : ''
          };
          $scope.vm.dtInstance.reloadData();
         });
      };

      $scope.getLines = function () {
         functions.async("POST",url,'getLines').then(function (promise) {
            $scope.lines = promise.data;
         });
      };

      $scope.getTypes = function () {
         functions.async("POST",url,'getTypes').then(function (promise) {
            $scope.types = promise.data;
         });
      };

      $scope.gerResposables = function () {
         functions.async("POST",url,'gerResposables').then(function (promise) {
            $scope.resposables = promise.data;
         });
      };

       var init = function () {
          functions.getSession();
          $scope.getTypes();
          $scope.getLines();
          $scope.gerResposables();
       };

       init();
   }
 });
