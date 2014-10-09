(function() {
	var app = angular.module('myApp', ['ngRoute']);

	  	app.controller('MainCtrl', ['$scope', function($scope) {s
	  		$scope.changeGotten = function (order, model_value) {
	  			$scope.numPeople = false;
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
	  				$('#slice_3 .info_gotten #container_' + order)s
	  					.find('.fond').show()
	  					.find('input').removeAttr('disabled', '');
	  			}
	  			
	  		}
	  		
	  		$scope.numItems = function() {
			    return  $("#slice_3 .info_gotten").length + 1;
			};

			if ($("#slice_3 .info_gotten").length > 4)
				$scope.numPeople = true;
	  	}]);
	  	
		//Directive for adding buttons on click that show an alert on click
		app.directive("addpeople", function($compile) {
			return function(scope, element, attrs) {
				element.bind("click", function() {
					var html = $("#slice_3 .info_gotten").last().clone();
					// change some attributes of new block
					html.find(".container").attr('id', 'container_' + scope.numItems());
					html.find(".container .order span").text(scope.numItems());
					html.find(".container select").attr('name', 'type_gotten_' + scope.numItems());
					html.find(".container select").attr('ng-model', 'type_gotten_' + scope.numItems());
					html.find(".container select").attr('ng-init', 'type_gotten_' + scope.numItems() + ' = 1');
					html.find(".container select").attr('ng-change', 'changeGotten(' + scope.numItems() + ', {{type_gotten_' + scope.numItems() + '}})');
					// append block
					var tag = angular.element(html);
					$compile(tag)(scope).appendTo($('#slice_3 .form001'));
					
				});
			};
		});

		app.directive("removepeople", function($compile) {
			return function(scope, element, attrs) {
				element.bind("click", function() {
					$('#slice_3 .form001 .info_gotten').last().toggle( "slow", function() {
					    // Animation complete.
					    this.remove();
				  	});
				});
			};
		});

})();