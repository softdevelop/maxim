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

	  	}]);
	  	
		//Directive for adding buttons on click that 
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
					html.find(".container .person").attr('name', 'type_gotten_' + scope.numItems());

					html.find(".container .checkboxThree").each(function(index) {
						index++;
						$(this).find('input').attr('name', 'person[general][' + scope.numItems() + '][person_aws_' + index + ']');
						$(this).find('input').attr('id', 'person_aws_' + index + '_' + scope.numItems());
						$(this).find('label').attr('for', 'person_aws_' + index + '_' + scope.numItems());
						$(this).find('input').attr('ng-model', 'person_aws_' + index + '_' + scope.numItems());
					});

					// show list people
					var people_num = scope.numItems() - 1;
					var name = angular.element('<li>{{person_first_name_' + people_num + '}}{{fond_name_' + people_num  + '}}</li>');
					$compile(name)(scope).appendTo($('#slice_3 .list_people'));

					// show percent block
					$('.percent ').show();
					$('.action-new-people .btn-remove').show();
					// append block
					var tag = angular.element(html);
					$compile(tag)(scope).appendTo($('#slice_3 .form001'));

					
				});
			};
		});
	
		app.directive("removepeople", function($compile) {
			return function(scope, element, attrs) {
				element.bind("click", function() {
					$('#slice_3 .form001 .info_gotten').last().toggle( "faste", function() {
					    // Animation complete.
					    $.when($(this).remove()).then(function () {
				    		if( $("#slice_3 .info_gotten").length <= 1) {
							  		$('.percent').hide();
							  		$('.action-new-people .btn-remove').hide();
							  	}
					    	});
				  	});
				  	
				});
			};
		});

		//Directive for adding buttons on click that 
		app.directive("addpeoplespecific", function($compile) {
			return function(scope, element, attrs) {
				element.bind("click", function() {
					var html = $("#slice_4 .info_gotten_specific").last().clone();
					// change some attributes of new block
					html.find(".container").attr('id', 'container_' + scope.numItemsSpecific());
					html.find(".container .order span").text(scope.numItemsSpecific());
					html.find(".container select").attr('name', 'type_gotten_specific' + scope.numItemsSpecific());
					html.find(".container select").attr('ng-model', 'type_gotten_specific' + scope.numItemsSpecific());
					html.find(".container select").attr('ng-init', 'type_gotten_specific' + scope.numItemsSpecific() + ' = 1');
					html.find(".container select").attr('ng-change', 'changeGottenSpecific(' + scope.numItemsSpecific() + ', {{type_gotten_specific' + scope.numItemsSpecific() + '}})');
					html.find(".container textarea").attr('id', 'property_description_' + scope.numItemsSpecific());
					html.find(".container textarea").attr('ng-model', 'property_description_' + scope.numItemsSpecific());
					html.find(".container textarea").attr('name', 'person[specific][' + scope.numItemsSpecific() + '][property_description]');
					html.find(".container .property_description label").attr('for', 'error_property_description_' + scope.numItemsSpecific());

					html.find(".container .checkboxThree").each(function(index) {
						$(this).find('input').attr('name', 'person[specific][' + scope.numItemsSpecific() + '][person_aws_' + index + '_specific]');
						$(this).find('input').attr('id', 'person_aws_' + index + '_' + scope.numItemsSpecific());
						$(this).find('label').attr('for', 'person_aws_' + index + '_' + scope.numItemsSpecific());
						$(this).find('input').attr('ng-model', 'person_aws_' + index + '_' + scope.numItemsSpecific() + '_specific');
					});
					// show percent block
					$('.percent ').show();
					$('.action-new-people .btn-remove').show();
					// append block
					var tag = angular.element(html);
					$compile(tag)(scope).appendTo($('#slice_4 .form001'));
				});
			};
		});

		app.directive("removepeoplespecific", function($compile) {
			return function(scope, element, attrs) {
				element.bind("click", function() {
					$('#slice_4 .form001 .info_gotten_specific').last().toggle( "faste", function() {
					    // Animation complete.
					    $.when($(this).remove()).then(function () {
				    		if( $("#slice_4 .info_gotten_specific").length <= 1) {
							  		$('.percent').hide();
							  		$('.action-new-people .btn-remove').hide();
							  	}
					    	});
				  	});
				  	
				});
			};
		});
})();