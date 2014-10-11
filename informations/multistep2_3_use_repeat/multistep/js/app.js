(function() {
	var app = angular.module('myApp', ['ngRoute']);

	  	app.controller('MainCtrl', ['$scope', function($scope) {


	  		$scope.changeGotten = function (order, model_value) {
	  			if (model_value == 2) {
	  				$('#slice_3 .info_gotten #container_' + order)
	  					.find('.person').show()
	  					.find('input').removeAttr('disabled', '');
	  				$('#slice_3 .info_gotten #container_' + order)
	  					.find('.fond').hide()
	  					.find('input').attr('disabled', 'disabled');

	  			} else {
	  				$('#slice_3 .info_gotten #container_' + order)
	  					.find('.person').hide()
	  					.find('input').attr('disabled', 'disabled');
	  				$('#slice_3 .info_gotten #container_' + order)
	  					.find('.fond').show()
	  					.find('input').removeAttr('disabled', '');
	  			}
	  		}
	  		
	  		$scope.changeGottenSpecific = function (order, model_value) {
	  			if (model_value == 2) {
	  				$('#slice_4 .info_gotten_specific #container_' + order)
	  					.find('.person').show()
	  					.find('input').removeAttr('disabled', '');
	  				$('#slice_4 .info_gotten_specific #container_' + order)
	  					.find('.fond').hide()
	  					.find('input').attr('disabled', 'disabled');

	  			} else {
	  				$('#slice_4 .info_gotten_specific #container_' + order)
	  					.find('.person').hide()
	  					.find('input').attr('disabled', 'disabled');
	  				$('#slice_4 .info_gotten_specific #container_' + order)
	  					.find('.fond').show()
	  					.find('input').removeAttr('disabled', '');
	  			}
	  		}

	  		$scope.numItems = function() {
			    return  $("#slice_3 .info_gotten").length + 1;
			};

			$scope.numItemsSpecific = function() {
			    return  $("#slice_4 .info_gotten_specific").length + 1;
			};
			
			$scope.list_general = [{order : 1}];
			$scope.addGeneral = function () {
				$scope.list_general.push({order : $scope.list_general.length});
				console.log($scope.list_general);
			}
	  	}]);
	  	
		
})();