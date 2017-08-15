/*
 @author: Luis Gallegos
 @version: 1.0
 This is the JavaScript File help us to send the values to the php files.
 */
 define([], function( ){
   return ['functions','$scope','$q'],
   function(functions,$scope,$q){
       var url = '../presenters/transportPresenter.php';
      //  $scope.reportTransport == "";

       $scope.getLines = function () {
          functions.async("POST",url,'getLines').then(function (promise) {
             $scope.lines = promise.data;
          });
       };

       $scope.getReport = function () {
            functions.async("POST",url,'getReport1',$scope.reportTransport).then(function (promise) {
             $scope.transports  = promise.data;
             if (promise.data.length == 0) {
                swal("Oops...", "Data not Found!", "error");
             }else{
                setTimeout(function() { examples.html(); }, 1000);
             }
          });
       }

       $scope.getReport2 = function () {
          var month = "0"+(parseInt($scope.startDate.getMonth())+1);
          if (month.length == 3) {
             month = month.substring(1);
          }
          $scope.stringDate = $scope.startDate.getFullYear()+"-"+month+"-"+$scope.startDate.getDate();
         //  console.log(stringDate);
            functions.async("POST",url,'getReport2',$scope.stringDate).then(function (promise) {
             $scope.transports2  = promise.data;
             if (promise.data.length == 0) {
                swal("Oops...", "Data not Found!", "error");
             }else{
                setTimeout(function() { examples.html2(); }, 1000);
             }
          });
       }
       var examples = {};

       examples.html = function () {
          var doc = new jsPDF('l');
          var elem = document.getElementById("HTMLtoPDF1");
          var res = doc.autoTableHtmlToJson(elem);
          doc.text(7, 15, "Report Line: "+$scope.reportTransport);
          doc.autoTable(res.columns, res.data, {
              startY: 20,
              margin: {horizontal: 7},
              bodyStyles: {valign: 'top'},
              styles: {overflow: 'linebreak', columnWidth: 'wrap'},
              columnStyles: {text: {columnWidth: 'auto'}}
          });
          doc.setProperties({
            title: 'Report Line: ' + $scope.reportTransport///,
            // subject: 'A jspdf-autotable example pdf (' + $scope.reportTransport + ')'
         });
         var name = 'Report Line: ' + $scope.reportTransport+".pdf";
         doc.save(name);
         //  return doc;
      };

      examples.html2 = function () {
         var doc = new jsPDF('l');
         var elem = document.getElementById("HTMLtoPDF2");
         var res = doc.autoTableHtmlToJson(elem);
         doc.text(7, 15, "Report Start Date: "+$scope.stringDate);
         doc.autoTable(res.columns, res.data, {
             startY: 20,
             margin: {horizontal: 7},
             bodyStyles: {valign: 'top'},
             styles: {overflow: 'linebreak', columnWidth: 'wrap'},
             columnStyles: {text: {columnWidth: 'auto'}}
         });
         doc.setProperties({
           title: 'Report Start Date: ' + $scope.stringDate///,
           // subject: 'A jspdf-autotable example pdf (' + $scope.reportTransport + ')'
        });
        var name = 'Report Start Date: ' + $scope.stringDate+".pdf";
        doc.save(name);
        //  return doc;
     };


       var init = function () {
          functions.getSession();
          $scope.getLines();
       };

       init();
   }
 });
