(function(){
	var app = angular.module('dropdown', [ ]);

	app.controller('DropDownCtrl', [ '$scope', '$http', function($scope, $http) {
		$http.get('/api/category').success(function(data) {
        	$scope.categorylists = data;
    	});

		$scope.changeMe = function (category_id) {
      $http.get('/api/sub-category/' + category_id).success(function(data) {
          	$scope.subcategorylists = data;
      	});
		};

    }]);

})();
