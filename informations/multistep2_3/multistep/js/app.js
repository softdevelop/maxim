(function() {
	var app = angular.module('myApp', ['ngRoute']);

	  	app.controller('MainCtrl', ['$scope', '$compile', function($scope, $compile) {


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

			$scope.jumpQA = function(person) {
				var isChecked = $('#container_' + person).find('.checkboxThree').first().find('input').is(':checked');
				if (isChecked) {
					$('#slice_3 #container_' + person).find('.q-asw:nth-child(3), .q-asw:nth-child(4)').show();
					$('#slice_3 #container_' + person).find('.q-asw:nth-child(3), .q-asw:nth-child(4)').find('input').removeAttr('disabled');
				} else {
					$('#slice_3 #container_' + person).find('.q-asw:nth-child(3), .q-asw:nth-child(4)').hide();
					$('#slice_3 #container_' + person).find('.q-asw:nth-child(3), .q-asw:nth-child(4)').find('input').attr('disabled', 'disabled');
				}
			}

			$scope.jumpQASpecific = function(person) {
				var isChecked = $('#slice_4 #container_' + person).find('.checkboxThree').first().find('input').is(':checked');
				if (isChecked) {
					$('#slice_4  #container_' + person).find('.q-asw:nth-child(4), .q-asw:nth-child(5)').show();
					$('#slice_4  #container_' + person).find('.q-asw:nth-child(5), .q-asw:nth-child(4)').find('input').removeAttr('disabled');
				} else {
					$('#slice_4  #container_' + person).find('.q-asw:nth-child(5), .q-asw:nth-child(4)').hide();
					$('#slice_4  #container_' + person).find('.q-asw:nth-child(5), .q-asw:nth-child(4)').find('input').attr('disabled', 'disabled');
				}
			}

	  		var people_num = $scope.numItems() - 1;
			var name = angular.element('<li><div class="radio_option"><input type="radio" name="choose_one" id="choose_one_' + people_num + '" class="css-checkbox prop_answers" value="3"><label for="choose_one_' + people_num + '" class="css-label radGroup1"></label></div><span>{{person_first_name_' + people_num + '}}{{fond_name_' + people_num  + '}}</span></li>');
			$compile(name)($scope).appendTo($('#slice_3 .list_people'));

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

					html.find(".container .checkboxThree").first().find('input').attr('ng-change', 'jumpQA(' + scope.numItems() + ')');

					html.find(".container .person").attr('name', 'type_gotten_' + scope.numItems());

					html.find("input[id^=person_first_name_]").attr('ng-model', 'person_first_name_' + scope.numItems());
					html.find("input[id^=person_first_name_]").attr('id', 'person_first_name_' + scope.numItems());
					
					html.find("input[id^=person_last_name_]").attr('ng-model', 'person_last_name_' + scope.numItems());
					html.find("input[id^=person_last_name_]").attr('id', 'person_last_name_' + scope.numItems());
					
					html.find("input[id^=person_civic_]").attr('ng-model', 'person_civic_' + scope.numItems());
					html.find("input[id^=person_civic_]").attr('id', 'person_civic_' + scope.numItems());

					html.find("input[id^=fond_name_]").attr('ng-model', 'fond_name_' + scope.numItems());
					html.find("input[id^=fond_name_]").attr('id', 'fond_name_' + scope.numItems());
					
					html.find("input[id^=fond_account_]").attr('ng-model', 'fond_account_' + scope.numItems());
					html.find("input[id^=fond_account_]").attr('id', 'fond_account_' + scope.numItems());

					html.find("input[id^=purpose_]").attr('ng-model', 'purpose_' + scope.numItems());
					html.find("input[id^=purpose_]").attr('id', 'purpose_' + scope.numItems());

					html.find(".container .checkboxThree").each(function(index) {
						index++;
						$(this).find('input').attr('name', 'person[general][' + scope.numItems() + '][person_aws_' + index + ']');
						$(this).find('input').attr('id', 'person_aws_' + index + '_' + scope.numItems());
						$(this).find('label').attr('for', 'person_aws_' + index + '_' + scope.numItems());
						$(this).find('input').attr('ng-model', 'person_aws_' + index + '_' + scope.numItems());
					});

					
					// show percent block
					$('.percent ').show();
					$('.action-new-people .btn-remove').show();
					// append block
					var tag = angular.element(html);
					$compile(tag)(scope).appendTo($('#slice_3 .form001'));

					// show list people
					var people_num = scope.numItems() - 1;
					var name = angular.element('<li><div class="radio_option"><input type="radio" name="choose_one" id="choose_one_' + people_num + '" class="css-checkbox prop_answers" value="3"><label for="choose_one_' + people_num + '" class="css-label radGroup1"></label></div><span>{{person_first_name_' + people_num + '}}{{fond_name_' + people_num  + '}}</span></li>');
					$compile(name)(scope).appendTo($('#slice_3 .list_people'));

					
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
						  	// $('#slice_3 .list_people li').last().remove();

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

					html.find(".container .checkboxThree").first().find('input').attr('ng-change', 'jumpQASpecific(' + scope.numItemsSpecific() + ')');

					html.find("input[id^=person_first_name_]").attr('ng-model', 'person_first_name_' + scope.numItemsSpecific());
					html.find("input[id^=person_first_name_]").attr('id', 'person_first_name_' + scope.numItemsSpecific());
					
					html.find("input[id^=person_last_name_]").attr('ng-model', 'person_last_name_' + scope.numItemsSpecific());
					html.find("input[id^=person_last_name_]").attr('id', 'person_last_name_' + scope.numItemsSpecific());
					
					html.find("input[id^=person_civic_]").attr('ng-model', 'person_civic_' + scope.numItemsSpecific());
					html.find("input[id^=person_civic_]").attr('id', 'person_civic_' + scope.numItemsSpecific());

					html.find("input[id^=fond_name_]").attr('ng-model', 'fond_name_' + scope.numItemsSpecific());
					html.find("input[id^=fond_name_]").attr('id', 'fond_name_' + scope.numItemsSpecific());
					
					html.find("input[id^=fond_account_]").attr('ng-model', 'fond_account_' + scope.numItemsSpecific());
					html.find("input[id^=fond_account_]").attr('id', 'fond_account_' + scope.numItemsSpecific());

					html.find("input[id^=purpose_]").attr('ng-model', 'purpose_' + scope.numItemsSpecific());
					html.find("input[id^=purpose_]").attr('id', 'purpose_' + scope.numItemsSpecific());

					
					
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