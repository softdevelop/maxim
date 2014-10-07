<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css">

<?php
	// handle post
	if (!empty($_POST)) 
	{

		$wpdb->insert( 
			$wpdb->prefix . 'preup', 
			array( 
				'man_name' => $_POST['man_name'],
				'man_pin' => $_POST['man_pin'], 
				'man_phone' => $_POST['man_phone'], 
				'man_identity' => $_POST['man_identity'], 
				'man_address' => $_POST['man_address'], 
				'man_postort' => $_POST['man_postort'], 
				'man_email' => $_POST['man_email'], 
				'women_name' => $_POST['women_name'], 
				'women_pin' => $_POST['women_pin'],
				'women_phone' => $_POST['women_phone'],
				'women_identity' => $_POST['women_identity'],
				'women_address' => $_POST['women_address'],
				'women_postort' => $_POST['women_postort'],
				'women_email' => $_POST['women_email'],
				'is_ready' => $_POST['is_ready'],
				'cohabiting_date' => $_POST['review_cohabiting_date'],
				'property_single' => $_POST['property_single'],
				'lieu_of_private_property' => $_POST['lieu_of_private_property'],
				'other_info' => $_POST['other_info'],
				'agree_terms' => $_POST['agree_terms'],
				'property_to_exclude_1' => isset($_POST['property_to_exclude_1']) ? json_encode($_POST['property_to_exclude_1']) : '',
				'property_to_exclude_2' => isset($_POST['property_to_exclude_2']) ? json_encode($_POST['property_to_exclude_2']) : '',
				'purpose' => $_POST['purpose'],

			), 
			array( 
			
			) 
		);
		unset($_POST);
		if (!$wpdb->show_errors) {
			echo '<script>
					$(function() {
				    	$(".message-success").fadeIn(1000).fadeOut(3000);
				  	});
				  </script>';

		}
	}

?>
<script>
	$(function() {
		$( "#cohabiting_date" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo get_template_directory_uri();?>/images/datepick.png",		
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			
		});
	});
	
	jQuery(function($){
	   $("#man_pin").mask("999999999999");
	   $("#women_pin").mask("9999999999999");
	   $("#man_phone").mask("999999999999999");
	   $("#women_phone").mask("9999999999999999");
	   $("#man_identity").mask("9999999999999999");
	   $("#women_identity").mask("9999999999999999");
	   $("#cohabiting_date").mask("99/99/9999");
	});

	var myApp = angular.module('myApp', ['ngRoute']);
  	function MainCtrl($scope) {
		$scope.count = 0;
	}
	//Directive for adding buttons on click that show an alert on click
	myApp.directive("addbuttons", function($compile) {
		return function(scope, element, attrs){
			element.bind("click", function() {
				scope.count++;
				var total_tags = $('.pte_element_1 ').length + 1;
				var tag = angular.element('<input type="text" name="property_to_exclude_1[]" id="property_to_exclude_1_' + total_tags + '" value="" class="register2 pte_element_1" placeholder="Min röda Volvo årsmodell 2012" ng-model="property_to_exclude_man_' + total_tags + '" />');
				var tag_review = angular.element('<span id ="review_pte_1_' + total_tags + '" class="review_pte review_pte_' + total_tags + '">{{property_to_exclude_man_' +total_tags + '}}</span>');

				angular.element($('.mans_info1 .pte_cont_1')).append($compile(tag)(scope));

				angular.element($('.review_property_to_exclude_1')).append($compile(tag_review)(scope));
			});
		};
	});

	myApp.directive("remove", function($compile) {
		return function(scope, element, attrs){
			element.bind("click", function() {
				var total_tags = $('.pte_element_1').length;
				angular.element($('#property_to_exclude_1_' + total_tags)).remove();
				angular.element($('#review_pte_1_' + total_tags)).remove();
			});
		};
	});

	//Directive for adding buttons on click that show an alert on click
	myApp.directive("addbuttons2", function($compile) {
		return function(scope, element, attrs){
			element.bind("click", function() {
				scope.count++;
				var total_tags = $('.pte_element_2').length + 1;
				var tag = angular.element('<input type="text" name="property_to_exclude_2[]" id="property_to_exclude_2_' + total_tags + '" value="" class="register2 pte_element_2" placeholder="Min röda Volvo årsmodell 2012" ng-model="property_to_exclude_woman_' + total_tags + '" />');
				var tag_review = angular.element('<span id ="review_pte_2_' + total_tags + '" class="review_pte review_pte_' + total_tags + '">{{property_to_exclude_woman_' +total_tags + '}}</span>');

				angular.element($('.womens_info1 .pte_cont_2')).append($compile(tag)(scope));

				angular.element($('.review_property_to_exclude_2x')).append($compile(tag_review)(scope));
			});
		};
	});

	myApp.directive("remove2", function($compile) {
		return function(scope, element, attrs){
			element.bind("click", function() {
				var total_tags = $('.pte_element_2').length;
				angular.element($('#property_to_exclude_2_' + total_tags)).remove();
				angular.element($('#review_pte_2_' + total_tags)).remove();
			});
		};
	});

</script>

<div id="infoCont" class="infoCont">
	<div class="infoHeader"><a id="closeInfoCont"><img src="

<?php echo get_template_directory_uri();?>/images/close_button.png"></a> </div>
	<div class="infoContent">
		Det Första alternativet innebär att vid en bodelning endast saker som är inköpta för gemensamt bruk delas på, era egna saker åsidosätts bodelningen.<br/><br/>
		Det Andra alternativet innebär att ni partiellt avtalar bort sambolagens bodelningsregler genom att uppräkna viss gemensam egendom som skall hållas utanför en framtida bodelning
	</div>
</div>

<div id="infoCont1" class="infoCont">
	<div class="infoHeader"><a id="closeInfoCont1"><img src="

<?php echo get_template_directory_uri();?>/images/close_button.png"></a> </div>
	<div class="infoContent">
		Lämna ett meddelande till oss. 
	</div>
</div>	

<div id="infoCont2" class="infoCont">
	<div class="infoHeader"><a id="closeInfoCont2"><img src="

<?php echo get_template_directory_uri();?>/images/close_button.png"></a> </div>
	<div class="infoContent">
		Sambos är två personer som stadigvarande bor tillsammans i ett parförhållande och har gemensamt hushåll(1§ sambolagen)
	</div>
</div>	

<div id="infoCont3" class="infoCont">
	<div class="infoHeader"><a id="closeInfoCont3"><img src="

<?php echo get_template_directory_uri();?>/images/close_button.png"></a> </div>
	<div class="infoContent">
		Stjärnelunds Juristhus är inte ansvarig för ekonomisk skada indirekt eller direkt, som kan uppstå genom att användandet av denna tjänst, genom att tjänst ej kan nyttjas eller på grund av fel eller brister i den information som ges. Ansvaret gentemot brukaren av våra tjänster kan aldrig bli större än den avgift som erlagts för tjänstens nyttjande.
	</div>
</div>	
	<form name="frmReg" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
	<!-- SLICE 1  -->
	<div class="container01" id="slice_0">
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>Beställning av äktenskapsförord</h1>
					<div class="filter001">
						
						<div class="fliter_step001 step"><h2>1</h2><div class="popup_top" ><p>Personuppgifter</p></div></div><!-- fliter_step001 -->
						
						<div class="fliter_step002 step"><h2>2</h2><div class="popup_top"><p>OMFATTING AV AKTENSKAPSFORORDET</p></div></div>
						
						<div class="fliter_step003 step"><h2>3</h2><div class="popup_top"><p>Översikt</p></div></div>
						
						<div class="fliter_step004 step"><h2>4</h2><div class="popup_top"><p>Meddelande</p></div></div>
						
						<div class="fliter_step005 step"><h2>5</h2><div class="popup_top"><p>Meddelande</p></div></div>

						<div class="fliter_step006 step"><h2>End</h2></div>
						
						
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001">
              		
              		<p>Här börjar din beställning av ett personligt utformat äktenskapsförord. </p>

					<p>Eftersom de uppgifter som genom formuläret tillhandahålles oss ligger till grund för utformandet av det personliga äktenskapsförordet är det av stor vikt att dessa är korrekta. Vi ber er därför att noga kontrollera de ifyllda uppgifterna innan ni slutför beställningen. Vid tveksamheter vid behandlingen av uppgifterna kommer vi naturligtvis kontakta er för ett klargörande innan äktenskapsförordet slutligen färdigställs. Dessutom har ni alltid rätt att återkomma till oss för ändringar inom en 14 dagars period.</p>

					<p>Alla uppgifter behandlas i enlighet med personuppgiftslagen konfidentiellt och kommer därför inte att röjas eller utelämnas till tredje part.</p>
				</div><!-- form001 -->
			</div><!-- wrapper -->
		</div><!-- form01 -->
		
		<div class="bottom">
			<div class="bottom1">
				<a id="next_0" class="btn_register next">Starta</a>
		    </div>
		</div><!-- bottom -->		
		
	</div><!-- container01 -->
	<!-- SLICE 1  -->
			
	<!-- SLICE 2  -->
	<div class="container01" style="display:none;" id="slice_1">
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>Personuppgifter</h1>
					<div class="filter002">
						
						<div class="fliter1_step001"><a class="parallelNav" id="sl_1_Navigate_1" ><h2>1</h2><div class="popup_top" style="display:block;"><p>Personuppgifter</p></div></a></div>
						<div class="fliter1_step002"><a class="parallelNav" id="sl_1_Navigate_2" ><h2>2</h2><div class="popup_top" ><p>Samboregler</p></div></a></div>
						<div class="fliter_step003"><a class="parallelNav" id="sl_1_Navigate_3" ><h2>3</h2><div class="popup_top"><p>Översikt</p></div></a></div>
						<div class="fliter_step004"><a class="parallelNav" id="sl_1_Navigate_4" ><h2>4</h2><div class="popup_top" ><p>Meddelande</p></div></a></div>
						<div class="fliter_step005"><a class="parallelNav" id="sl_1_Navigate_5" ><h2>5</h2></a></div>
						<div class="fliter_step006"><a class="parallelNav" id="sl_1_Navigate_6" ><h2>End</h2></a></div>
						
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001">
					<div class="mans_info">
						<h1>Personuppgifter för första person</h1>
						<div class="man_info">
							<input type="text" name="man_name" id="man_name" placeholder="Ange Fullständigt Namn"  class="register user" ng-model="man_name"> 
							<p class="error_msg" id="error_man_name" ></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="man_address" id="man_address" placeholder="Ange din Adress"  class="register address" ng-model="man_address" > 
							<p class="error_msg" id="error_man_address"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="man_pin" id="man_pin" placeholder="Ange ditt Postnummer"  class="register pincode" ng-model="man_pin"> 
							<p class="error_msg" id="error_man_pin"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="man_postort" id="man_postort" placeholder="Ange din Postort"  class="register post" ng-model="man_postort"> 
							<p class="error_msg" id="error_man_postort"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="man_phone" id="man_phone" placeholder="Ange ditt telefonnummer"  class="register phone" ng-model="man_phone"> 
							<p class="error_msg" id="error_man_phone"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="man_email" id="man_email" placeholder="Ange din e-postadress"  class="register email" ng-model="man_email" > 
							<p class="error_msg" id="error_man_email"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="man_identity" id="man_identity" placeholder="Ange ditt personnummer (XXXXXXxxxx)"  class="register uid" ng-model="man_identity"> 							
							<p class="error_msg" id="error_man_identity"></p>
						</div>
					
					</div><!-- mans_info -->
					
					<div class="womens_info" style="display:none !important;">
						<h1>Personuppgifter för andra person</h1>
						<div class="man_info">
							<input type="text" name="women_name" id="women_name" placeholder="Ange Fullständigt Namn"  class="register user" ng-model="women_name"> 
							<p class="error_msg" id="error_women_name"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="women_address" id="women_address" placeholder="Ange din Adress"  class="register address" ng-model="women_address" > 
							<p class="error_msg" id="error_women_address"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="women_pin" id="women_pin" placeholder="Ange ditt Postnummer"  class="register pincode" ng-model="women_pin" > 
							<p class="error_msg" id="error_women_pin"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="women_postort" id="women_postort" placeholder="Ange din Postort"  class="register post" ng-model="women_postort" > 
							<p class="error_msg" id="error_women_postort"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="women_phone" id="women_phone" placeholder="Ange ditt telefonnummer"  class="register phone" ng-model="women_phone" > 
							<p class="error_msg" id="error_women_phone"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="women_email" id="women_email" placeholder="Ange din e-postadress"  class="register email" ng-model="women_email" > 
							<p class="error_msg" id="error_women_email"></p>
						</div>
						
						<div class="man_info">
							<input type="text" name="women_identity" id="women_identity" placeholder="Ange ditt personnummer (XXXXXXxxxx)"  class="register uid" ng-model="women_identity" > 							
							<p class="error_msg" id="error_women_identity"></p>
						</div>
						
					</div><!-- womens_info -->
					
				</div><!-- form001 -->
			</div><!-- wrapper -->
		</div><!-- form01 -->
		
		<div class="bottom">
			<div class="bottom1">
				<a class="btn_register2 prev" id="prev_1" >Tillbaka</a>
				<a class="btn_register1 next" id="next_1" >Nästa</a>
			</div>
		</div><!-- bottom -->		
		
	</div><!-- container01 -->
	<!-- SLICE 2 -->		
			
	<!-- SLICE 3 -->		
	<div class="container01" style="display:none;" id="slice_2">
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>OMFATTNING AV ÄKTENSKAPSFÖRORDET</h1>
					<div class="filter003">
						
						<div class="fliter2_step001"><a class="navCircle" id="sl2Navigate_1" style="cursor:pointer;"><h2>1</h2><div class="popup_top" ><p>Personuppgifter</p></div></a></div>
						<div class="fliter1_step002"><a class="parallelNav" id="sl_2_Navigate_2" ><h2>2</h2><div class="popup_top" style="display:block;"><p>Samboregler</p></div></a></div>
						<div class="fliter_step003"><a class="parallelNav" id="sl_2_Navigate_3" ><h2>3</h2><div class="popup_top"><p>Översikt</p></div><a></div>
						<div class="fliter_step004"><a class="parallelNav" id="sl_2_Navigate_4" ><h2>4</h2><div class="popup_top" ><p>Meddelande</p></div></a></div>
						<div class="fliter_step005"><a class="parallelNav" id="sl_2_Navigate_5" ><h2>5</h2></a></div>
						<div class="fliter_step006"><a class="parallelNav" id="sl_2_Navigate_6" ><h2>End</h2></a></div>
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001">
					<div class="condition01">
						<p>Är ni gifta sedan tidigare? <a id="infoTrigger2" style="cursor:pointer;" ><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a></p>

						<div class="">
						<div class="checkboxThree">
							<input type="checkbox" value="1" id="checkboxThreeInput" name="is_ready" checked="checked" ng-model="checkboxThreeInput" />
							<label for="checkboxThreeInput"></label>
						</div>
												
						</div> <!-- checkboxThree -->
					</div><!-- condition01 -->
					
					<div class="condition02">
						<p id="checkboxThreeInput_label" ></p>		
						
						<input type="text" name="cohabiting_date"  id="cohabiting_date"  class="register1" placeholder="DD/MM/ÅÅÅÅ" style="padding-left:10px !important; margin-right:5px; margin-top: 10px;" disabled ng-model="checkboxThreeInput_date">
						<p class="error_msg" id="error_cohabiting_date"></p>
					</div><!-- condition02 -->
					<div class="line"></div>

					<div class="step3-part-options">
						<p class>Vi önskar att:</p>
						<span>(välj endast ett alternativ )</span>
						<div class="q-asw q-asw-1">
							<div class="question">
								<p>all egendom vi äger, eller ägde, vid äktenskapets ingående skall omfattas av äktenskapsförordet. </p>
								<div class="radio_option">
									<input type="radio" name="purpose" id="purpose_1" class="css-checkbox prop_answers" checked="checked" value="all egendom vi äger, eller ägde, vid äktenskapets ingående skall omfattas av äktenskapsförordet." ng-mode="purpose"/>
										<label for="purpose_1" class="css-label radGroup1"></label>
								</div>
							</div>
							<div class="asw">
								<div class="condition_box">
									<div class="condition_box02">
									<a id="infoTrigger" style="cursor:pointer;"><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a>
									</div>
									<p>
										Alternativet innebär att all egendom som var och en av oss ägt innan äktenskapets ingående förblir dennes enskilda egendom även efter giftermålet. All annan egendom som förvärvats efter äktenskapets ingående skall vid en bodelning behandlas som giftorättsgods och således delas lika. 
									</p><p>
										Exempel. Kalle äger en båt och Lisa äger en tavla. Vid detta val kommer båten fortsättningsvis vara Kalles och tavlan vara Lisas. All egendom som Kalle och Lisa köper i framtiden kommer dock vara deras gemensamma, om inte en ändring görs i äktenskapsförordet .
									</p>
								</div>
							</div>
						</div>

						<div class="q-asw q-asw-2">
							<div class="question">
								<p>all egendom vi äger, eller ägde, vid äktenskapets ingående skall omfattas av äktenskapsförordet. </p>
								<div class="radio_option">
									<input type="radio" name="purpose" id="purpose_2" class="css-checkbox prop_answers" checked="checked" value="all egendom vi äger, eller ägde, vid äktenskapets ingående skall omfattas av äktenskapsförordet" ng-mode="purpose"/>
										<label for="purpose_2" class="css-label radGroup1"></label>
								</div>
							</div>
							<div class="asw">
								<div class="condition_box">
									<div class="condition_box02">
									<a id="infoTrigger" style="cursor:pointer;"><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a>
									</div>
									<p>
										Alternativet innebär att all egendom, gammal som ny, kommer att behandlas som enskild egendom vid en bodelning och därför inte delas lika vid denne.  
									</p><p>
										Exempel. Kalle äger en båt och Lisa äger en tavla. Vid detta val kommer båten fortsättningsvis vara Kalles och tavlan vara Lisas. All egendom som Kalle och Lisa köper i framtiden kommer att fortsätta vara antingen Kalles eller Lisas beroende på vem som köper.
									</p>
								</div>
							</div>
						</div>

						<div class="q-asw q-asw-1">
							<div class="question">
								<p>all egendom som var och en av oss utfått och i framtiden eventuellt kommer att erhålla genom arv, gåva och testamente skall omfattas av äktenskapsförordet. </p>
								<div class="radio_option">
									<input type="radio" name="purpose" id="purpose_3" class="css-checkbox prop_answers" checked="checked" value="all egendom som var och en av oss utfått och i framtiden eventuellt kommer att erhålla genom arv, gåva och testamente skall omfattas av äktenskapsförordet." ng-mode="purpose"/>
										<label for="purpose_3" class="css-label radGroup1"></label>
								</div>

								</div>
							<div class="asw">
								<div class="condition_box">
									<div class="condition_box02">
									<a id="infoTrigger" style="cursor:pointer;"><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a>
									</div>
									<p>
										Alternativet innebär att det som var och en av er idag redan har eller i framtiden kommer att få behandlas som enskild egendom vid en bodelning och därför inte delas lika vid denne.
									</p><p>
										Exempel. Kalle äger en båt och Lisa äger en tavla. Vid detta val kommer båten fortsättningsvis vara Kalles och tavlan vara Lisas. Om Lisa i framtiden ärver en bil kommer denne vara hennes egendom. Samma gäller för Kalle. Men saker de själva köper kommer behandlas som gemensam egendom och delas lika vid en bodelning. 
									</p>
								</div>
							</div>
						</div>
					</div>	
				</div><!-- form001 -->
			</div><!-- wrapper -->
		</div><!-- form01 -->
		
		<div class="bottom">
			<div class="bottom1">
				<a class="btn_register2 prev" id="prev_2" >Tillbaka</a>
				<a class="btn_register1 next" id="next_2">Nästa</a>
			</div>
		</div><!-- bottom -->		
		
	</div><!-- container01 -->
	<!-- SLICE 3  -->		
	<div class="container01" style="display:none;" id="slice_3">
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>Översikt</h1>
					<div class="filter004">
						
						<div class="fliter2_step001"><a class="navCircle" id="sl3Navigate_1" style="cursor:pointer;"><h2>1</h2><div class="popup_top" ><p>Personuppgifter</p></div></a></div>
						<div class="fliter3_step002"><a class="navCircle" id="sl3Navigate_2" style="cursor:pointer;"><h2>2</h2><div class="popup_top" ><p>Samboregler</p></div></a></div>
						<div class="fliter_step003"><a class="parallelNav" id="sl_3_Navigate_3" ><h2>3</h2><div class="popup_top" style="display:block;"><p>Översikt</p></div></a></div>
						<div class="fliter_step004"><a class="parallelNav" id="sl_3_Navigate_4" ><h2>4</h2><div class="popup_top" ><p>Meddelande</p></div></a></div>
						<div class="fliter_step005"><a class="parallelNav" id="sl_3_Navigate_5" ><h2>5</h2></a></div>
						<div class="fliter_step006"><a class="parallelNav" id="sl_3_Navigate_6" ><h2>End</h2></a></div>
						
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001">
					<p>följande nedtecknad egendom skall omfattas av äktenskapsförordet: </p>
					<div class="condition_box">
						<div class="condition_box02">
						<a id="infoTrigger" style="cursor:pointer;"><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a>
						</div>
						<p>
							Detta innebär en specifikation av den egendom som ni anser skall behandlas som enskild och således inte ingå i vid en framtida bodelning (dvs. inte delas lika).
						</p><p>
							Denna nedteckning kompletterar det alternativ som ni valt ovan. Ni behöver endast fylla i denna information om ni redan här vill göra klart och tydligt vad som är er enskilda egendom. Annars gäller det alternativ som ni valt ovan.
						</p>
					</div>

					<div class="mans_info1">
						<p><span id="">{{man_name}}</span> &nbsp;enskilda egendom:</p>
						<div class="property" id="property_cont1">
																	
							<div class="pte_cont_1">
								<input type="text" name="property_to_exclude_1[]" id="property_to_exclude_1_1" value="" class="register2 pte_element_1" placeholder="Min röda Volvo årsmodell 2012" ng-model="property_to_exclude_man"> 									
							</div> 
							<div id="property_new_elements_cont_1">
							</div>		
							<div class="pte_controls">
								<a class="add_pte_1" id="add_pte_1" addbuttons><img src="

<?php echo get_template_directory_uri();?>/images/plus_button.png"><div class="popup_top1"><p>Lägg till rad</p></div></a>
								<a class="remove_pte_1" remove><img src="

<?php echo get_template_directory_uri();?>/images/close_button.png"><div class="popup_top1"><p>Ta bort rad</p></div></a>
							</div>						 
						</div>
					</div><!-- mans_info1 -->
					
					<div class="womens_info1">
						<p><span id="">{{women_name}}</span> &nbsp;enskilda egendom:</p>
						<div class="property" id="property_cont2">
																	
							<div class="pte_cont_2">
								<input type="text" name="property_to_exclude_2[]" id="property_to_exclude_2_1" value="" class="register2 pte_element_2" placeholder="Min röda Volvo årsmodell 2012" ng-model="property_to_exclude_women"> 									
							</div> 
							<div id="property_new_elements_cont_2">
							</div>		
							<div class="pte_controls">
								<a class="add_pte_2" id="add_pte_2" addbuttons2><img src="

<?php echo get_template_directory_uri();?>/images/plus_button.png"><div class="popup_top1"><p>Lägg till rad</p></div></a>
								<a class="remove_pte_2" remove2><img src="

<?php echo get_template_directory_uri();?>/images/close_button.png"><div class="popup_top1"><p>Ta bort rad</p></div></a>
							</div>						 
						</div>
					</div><!-- womens_info1 -->
					
					<div class="uppgifter">
						<div class="contain-switch">
							<p>Övriga uppgifter <span> (välj de alternativ som passar er bäst)</span> </p>
							<div class="contain-switch-item">
								<p>Vi önskar att eventuell avkastning från enskild egendom skall vara enskild.</p>
								<div class="checkboxThree2">
									<input type="checkbox" value="1" id="checkboxThree2" name="property_single" checked="checked" />
									<label for="checkboxThree2"></label>
								</div>
							</div>
						</div>
						<div class="your_answer_step4" style="padding-top:10px;">
							<p>Vi önskar att egendom som träder istället för enskild egendom, exempelvis genom att enskild egendom har försålts och annan egendom har införskaffats, skall vara: </p>
							<div class='contain-radio-option'>
								<div class="radio_option">
									<input type="radio" name="lieu_of_private_property" id="purpose_4" class="css-checkbox prop_answers" checked="checked" value="Enskild egendom" ng-model="purpose_leo">
									<label for="purpose_4" class="css-label radGroup1">Enskild egendom</label>
																	
								</div>
								<div class="radio_option">
									<input type="radio" name="lieu_of_private_property" id="purpose_5" class="css-checkbox prop_answers" value="Giftorättsgods" ng-model="purpose_leo">
									<label for="purpose_5" class="css-label radGroup1">Giftorättsgods</label>
																	
								</div>
							</div>
						</div>
					</div>
				</div><!-- form001 -->	
			</div><!-- wrapper -->
		</div><!-- form01 -->
		<div class="bottom">
			<div class="bottom1">
				<a class="btn_register2 prev" id="prev_3" >Tillbaka</a>
				<a class="btn_register1 next" id="next_3" >Nästa</a>
			</div>
		</div><!-- bottom -->
	</div>

	<!-- SLICE 4  -->
	<div class="container01" style="display:none;" id="slice_4">
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>Juridiska Villkor</h1>
					<div class="filter005">
						<div class="fliter2_step001"><a class="navCircle" id="sl2Navigate_1" style="cursor:pointer;"><h2>1</h2><div class="popup_top" ><p>Personuppgifter</p></div></a></div>
						<div class="fliter3_step002"><a class="parallelNav" id="sl_2_Navigate_2" ><h2>2</h2><div class="popup_top"><p>Samboregler</p></div></a></div>
						<div class="fliter4_step003"><a class="parallelNav" id="sl_2_Navigate_3" ><h2>3</h2><div class="popup_top" ><p>Översikt</p></div></a></div>
						<div class="fliter_step004"><a class="parallelNav" id="sl_2_Navigate_4" ><h2>4</h2><div class="popup_top" style="display:block;" ><p>Meddelande</p></div></a></div>
						<div class="fliter_step005"><a class="parallelNav" id="sl_2_Navigate_5" ><h2>5</h2></a></div>
						<div class="fliter_step006"><a class="parallelNav" id="sl_2_Navigate_6" ><h2>End</h2></a></div>
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001" style="border: 1px solid #ccc;padding: 10px;margin-left: -30px;border-radius: 5px;">
					<form>
						<div class="mans_info1">
							<h1>Personuppgifter för första person</h1>
							<p><b>Namn :</b><span>{{man_name}}</span></p>
							<p><b>Adress :</b><span class="">{{man_address}}</span></p>
							<p><b>Postnummer :</b><span class="">{{man_pin}}</span></p>
							<p><b>Postort :</b><span class="review_man_postort">{{man_postort}}</span></p>
							<p><b>Telefonnummer :</b><span class="review_man_phone">{{man_phone}}</span></p>
							<p><b>E-post :</b><span class="review_man_email">{{man_email}}</span></p>
							<p><b>Personnummer :</b><span class="review_man_identity">{{man_identity}}</span></p>
							
						</div><!-- mans_info1 -->
						
						<div class="womens_info1">
							<h1>Personuppgifter för andra person</h1>
							<p><b>Namn :</b><span class="review_women_name">{{women_name}}</span></p>
							
							<p><b>Adress:</b><span class="review_women_address">{{women_address}}</span></p>
							
							<p><b>Postnummer:</b><span class="review_women_pin">{{women_pin}}</span></p>
							
							<p><b>Postort:</b><span class="review_women_postort">{{women_postort}}</span></p>	
							
							<p><b>Telefonnummer :</b><span class="review_women_phone">{{women_phone}}</span></p>
							
							<p><b>E-post:</b><span class="review_women_email">{{women_email}}</span></p>
							
							<p><b>Personnummer:</b><span class="review_women_identity">{{women_identity}}</span></p>
							
						</div><!-- womens_info1 -->
						
						<div class="condition001">
							<h1>OMFATTNING AV ÄKTENSKAPSFÖRORDET</h1>
						</div>
						<div class="your_answer001">
							<div class="review">
								<span class="left" style="float:left;">Är ni gifta sedan tidigare?</span>
								<div style="float:right;margin-top: 5px;">
									<input type="hidden" name="review_purpose" id="review_cohabiting_ip" class="" >
									<span class="review_cohabiting_date right" id="review_cohabiting"></span> |
									<span class="">{{checkboxThreeInput_date}}</span>
									<input type="hidden" name="review_cohabiting_date" class="" value="{{checkboxThreeInput_date}}">
								</div>
							</div>
						</div>
						<div class="condition002 center" width="95%">
							<h1>Vi önskar att:</h1>
							<div class="reviews">
								<span class="review_purpose"></span> 
							</div>
						</div>
						<div class="your_answer001">
							<div class="condition002 center">
								<h1>följande nedtecknad egendom skall omfattas av äktenskapsförordet:</h1>
								<div class="reviews">
									<span class="">{{man_name}}</span>  enskilda egendom: 
									
									<div class="review_property_to_exclude_1">
										<span class="review_pte" id="review_pte_1_1">{{property_to_exclude_man}}</span>
									</div>
									
								</div>
								<div class="reviews">
									<span class="">{{women_name}}</span>  enskilda egendom:
									<div class="review_property_to_exclude_2x">
										<span class="review_pte" id="review_pte_2_1">{{property_to_exclude_women}}</span>
									</div> 
									
								</div>
							</div>
							<div class="condition002 center">
								<h1>Övriga uppgifter</h1>
								<div class="reviews">
									<span class="left">Vi önskar att eventuell avkastning från enskild egendom skall vara enskild.</span> 
									<p id="review_checkboxThree2"></p>
								</div>
							</div>
							<div class="condition002 center">
								<div class="reviews">
									<span>Vi önskar att egendom som träder istället för enskild egendom, exempelvis genom att enskild egendom har försålts och annan egendom har införskaffats, skall vara:</span><br/>
								</div>
								<div class="reviews">
									{{purpose_leo}}
								</div>
							</div>
						</div>
					
				</div><!-- form001 -->
			</div><!-- wrapper -->
		</div><!-- form01 -->
		
		<div class="bottom">
			<div class="bottom1">
				<a class="btn_register2 prev" id="prev_4" >Tillbaka</a>
				<a class="btn_register1 next" id="next_4" >Nästa</a>
			</div>
		</div><!-- bottom -->		
	</div>
	<!-- SLICE 5  -->
	<div class="container01" id="slice_5" style="display: none;" >
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>Betalning</h1>
					<div class="filter006">
						<div class="fliter2_step001"><a class="navCircle" id="sl2Navigate_1" style="cursor:pointer;"><h2>1</h2><div class="popup_top" ><p>Personuppgifter</p></div></a></div>
						<div class="fliter3_step002"><a class="parallelNav" id="sl_2_Navigate_2" ><h2>2</h2><div class="popup_top"><p>Samboregler</p></div></a></div>
						<div class="fliter4_step003"><a class="parallelNav" id="sl_2_Navigate_3" ><h2>3</h2><div class="popup_top"><p>Översikt</p></div></a></div>
						<div class="fliter5_step004"><a class="parallelNav" id="sl_2_Navigate_4" ><h2>4</h2><div class="popup_top" ><p>Meddelande</p></div></a></div>
						<div class="fliter_step005"><a class="parallelNav" id="sl_2_Navigate_5" ><h2>5</h2><div class="popup_top" style="display: block;"><p>Översikt</p></div></a></div>
						<div class="fliter_step006"><a class="parallelNav" id="sl_2_Navigate_6" ><h2>End</h2></a></div>
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001">
					<div class="terms_conditions">
						<h3>Meddelande</h3>
						<a id="infoTrigger1" style="cursor:pointer;" ><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a>
						<textarea rows="4" cols="85" class="other_info" name="other_info" id="other_info" ></textarea>
						<img src="

<?php echo get_template_directory_uri();?>/images/terms.jpeg">
						<p>Jag har härmed lämnat information för skapande av ett Samboavtal. Jag har läst och godkänner Stjärnelunds Juristhus juridiska villkor för användande av denna tjänst samt beställning härigenom. </p>
						<div class="container-agree-terms" with="100%">
							<div class="agree_terms">
								<input type="radio" name="agree_terms" id="agree_terms_1" class="css-checkbox" checked="checked"  value="1"/>
									<label for="agree_terms_1" class="css-label radGroup1" value="1"  style="padding-left: 50px;height: 23px;">Jag godkänner</label>
								
								
								<input type="radio" name="agree_terms" id="agree_terms_2" class="css-checkbox" value="0"/>
									<label for="agree_terms_2" class="css-label radGroup1"  style="padding-left: 50px;height: 23px;">Jag godkänner inte</label>
								 <a id="infoTrigger3" style="cursor:pointer;padding-top: 5px;" ><img src="

<?php echo get_template_directory_uri();?>/images/info.png"><span>Läs mer</span></a>
								<p class="error_msg" id="error_agree_terms"></p>
							</div><!-- agree_terms -->
						</div><!-- continer-agree_terms -->
						
					</div><!-- terms_conditions -->
				</div><!-- form001 -->
			</div><!-- wrapper -->
		</div><!-- form01 -->
		
		<div class="bottom">
			<div class="bottom1">
				<a class="btn_register2 prev" id="prev_5" >Tilllbaka</a>
				<a class="btn_register1 next" id="next_5" >Nästa</a>		
			</div>
		</div><!-- bottom -->		
		
	</div>

	<div class="container01" id="slice_6" style="display:none;">
		<div class="header1">
			<div class="wrapper">
				<div class="header01">
					<h1>Betalning</h1>
					<div class="filter007">
						<div class="fliter2_step001"><a class="navCircle" id="sl2Navigate_1" style="cursor:pointer;"><h2>1</h2><div class="popup_top" ><p>Personuppgifter</p></div></a></div>
						<div class="fliter3_step002"><a class="parallelNav" id="sl_2_Navigate_2" ><h2>2</h2><div class="popup_top"><p>Samboregler</p></div></a></div>
						<div class="fliter4_step003"><a class="parallelNav" id="sl_2_Navigate_3" ><h2>3</h2></a></div>
						<div class="fliter5_step004"><a class="parallelNav" id="sl_2_Navigate_4" ><h2>4</h2><div class="popup_top" ><p>Meddelande</p></div></a></div>
						<div class="fliter6_step005"><a class="parallelNav" id="sl_2_Navigate_5" ><h2>5</h2></a></div>
						<div class="fliter_step006"><a class="parallelNav" id="sl_2_Navigate_6" ><h2>End</h2><div class="popup_top" style="display:block;"><p>End</p></div></a></div>	
					</div><!-- filter001 -->
				</div><!-- header01 -->
			</div><!-- wrapper -->
		</div><!-- header1 -->
		
		
		<div class="form01">
			<div class="wrapper">
				<div class="form001">
					<div class="terms_conditions">
						<h3 style="text-align:center;">Din beställning är nu klar. Tryck på knappen nedan för att välja betalsätt samt genomföra denna.</h3>
						
					</div><!-- terms_conditions -->
				</div><!-- form001 -->
			</div><!-- wrapper -->
		</div><!-- form01 -->
		
		<div class="bottom">
			<input type="submit" name="btn_submit" value="Betala" class="btn_register">			
		</div><!-- bottom -->		
		
	</div>
</form>