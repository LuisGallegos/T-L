define([], function () {
    return function ($http,$rootScope) {
        this.async = function (type, url, request, params) {
//            console.log("asyncData('" + type + "', '" + url + "', '" + request + "', '" + params + "')");
            var promise = $http({
                url: url,
                method: type,
                data: $.param({'request': request, 'params': params}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {
                return response;
            });
            return promise;
        };

        this.sync = function (url, params) {
        //    console.log("asyncData('" + url + "', '" + params + "')");
            var myJson = "null";
            // console.log(myJson);
            $.ajax({
                type: 'POST',
                async: false,
                cache: false,
                data: params,
                url: url,
                dataType: 'json',
                success: function (data) {
                    myJson = data;
                }
            });
            eval(myJson);
            return myJson;
        };

        this.getSession = function () {
          var msg = $("#sessionOrigin").text();
          var url = '../presenters/headerPresenter.php';
          this.async("POST",url,'getPermission',msg).then(function (promise) {
            $rootScope.userData = promise.data[0];
            if (promise.data[0].rol == "Logistcs") {
              $rootScope.isLogistic = true;
              $rootScope.isVigilant = true;
              $rootScope.isEncargado = true;
           }else if (promise.data[0].rol == "Vigilant") {
              $rootScope.isLogistic = false;
              $rootScope.isVigilant = true;
              $rootScope.isEncargado = true;
           }else if (promise.data[0].rol == "Bus Manager") {
              $rootScope.isLogistic = false;
              $rootScope.isVigilant = false;
              $rootScope.isEncargado = true;
           }else{
              $rootScope.isLogistic = false;
              $rootScope.isVigilant = false;
              $rootScope.isEncargado = false;
           }
          });
        }
    };
});
