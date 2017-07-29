(function(){
	var app = angular.module('dropdown', [ ]);

	app.controller('DropDownCtrl', [ '$scope', '$http', function($scope, $http) {
		$http.get('/api/province').success(function(data) {
        	$scope.provincelists = data;
    	});

		$scope.init = function (id) {
			$http.get('/api/city/' + id).success(function(data) {
						$scope.citylists = data;
				});
		};

		$scope.changeMe = function (province_id) {
      $http.get('/api/city/' + province_id).success(function(data) {
          	$scope.citylists = data;
      	});
		};

    }]);

})();
