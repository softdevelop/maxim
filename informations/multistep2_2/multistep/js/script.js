$(document).ready(function(){
	var completedForms = [0, 0, 0, 0, 0, 0, 0];
	
	$('.next').on("click",function(){
		
		$('.error_msg').html('');
		var elementId = $(this).attr('id');
		var entityId = elementId.split('_')[1];
		var targetSliceId = parseInt(entityId)+1;
		var isValidForm = true;
		if(targetSliceId == 2) {
			isValidForm = isValidForm1();
			$("#propVar").html($("#man_name").val());
		}
		if(targetSliceId == 3) isValidForm = isValidForm2();	
		if(targetSliceId == 6) isValidForm = isValidForm4();	
		
		if(isValidForm) {
			completedForms[entityId] = 	1;
			if(targetSliceId == 3) prefillReview();
			$('.container01').hide();			
			$('#slice_'+targetSliceId).show();
		} else {	
			completedForms[entityId] = 	0;
			return false;
		}
		
		
	});
	
	$('.prev').click(function(){
		$('.mans_info').show();$('.womens_info').show();
		var elementId = $(this).attr('id');
		var entityId = elementId.split('_')[1];
		var targetSliceId = parseInt(entityId)-1;
		$('.container01').hide(); 
		$('#slice_'+targetSliceId).show();
		
		if(isValidForm3()) {
			alert ('vaid form 3');
		}
	});
	
	$('.register').click(function(){
		$(this).removeClass('error_input');
		$(this).removeClass('success_input');
		var elementId = $(this).attr('id');
		$('#error_'+elementId).html('');
	});
	
	$('.register').focusout(function(){
		var elementId = $(this).attr('id');
		var isValidField = false;
		var hasError = false;
		var errorMsg = 'Obligatoriskt fält';
		if($(this).val().trim() && $(this).val().trim() != '' ) {	
			if(elementId == 'man_email' || elementId == 'women_email') {
				if(!IsValidEmail($(this).val())) { 
					hasError = true;
					errorMsg = 'Ej korrekt e-post';
				} else {
					isValidField = true;
				}				
			} else isValidField = true;
		}
				
		if(isValidField) {
			$(this).addClass('success_input');
		} 
		if(hasError) { 
			$('#error_'+elementId).html(errorMsg);
			$(this).addClass('error_input');	
		}
	});
	
	$('.mans_info .register').focusout(function(){
		var isCompletedMansInfo = isValidMansInfo();
		if(isCompletedMansInfo) {			
			$('.womens_info').show();
		}
	});
	
	$('.register1').click(function(){
		$(this).removeClass('error_input');
		$(this).removeClass('success_input');
		var elementId = $(this).attr('id');
		$('#error_'+elementId).html('');
	});
	
	$('.register1').change(function(){
		var elementId = $(this).attr('id');
		var isValidField = true;
		var errorMsg = 'Obligatorisk fält';
		if(!$(this).val().trim() || $(this).val().trim() == '' ) {	
			isValidField = false;					
		} 
		
		if(isValidField) {
			$(this).addClass('success_input');
		} else {
			$('#error_'+elementId).html(errorMsg);
			$(this).addClass('error_input');	
		}
	});
		
	$('#checkboxThreeInput').click(function(){
		var checkboxThreeInput = $('#checkboxThreeInput').is(":checked");
		if(checkboxThreeInput) {
			$('#checkboxThreeInput_label').html('');
		} else {
			$('#checkboxThreeInput_label').html('Om Nej , när infinner sig kommande vigseldatum?');
		}
	}); 
	$('#checkboxThree').click(function(){
		var checkboxThree = $('#checkboxThree').is(":checked");
		if(checkboxThree) {
			$('#checkboxThree_label').html('');
		} else {
			$('#checkboxThree_label').html('Om Nej , när infinner sig kommande vigseldatum?');
		}
	}); 
		
	$('#cohabiting_date').change(function(){
		$('#purpose_cont').show();
	});
	
	$('.navCircle').click(function(){
		$('.mans_info').show();		$('.womens_info').show();
		var elementId = $(this).attr('id');
		var entityId = elementId.split('_')[1];
		$('.container01').hide();			
		$('#slice_'+entityId).show();
	});
	
	$('.parallelNav').click(function(){
	    var elementId = $(this).attr('id');
		var entityId = elementId.split('_')[3];
		if(completedForms[entityId]) {
			$('.container01').hide();			
		    $('#slice_'+entityId).show();
		}
	});
	
	$('.prop_answers').click(function(){
		var answer = $('input[name=purpose]:checked').val();	
		if(answer == 'Vi vill delvis avtala bort sambolagens regler.') $('#propDocContainer').show();
		else $('#propDocContainer').hide();
	});
	
	$('#infoTrigger').click(function(){
		$('#infoCont').show();
	});
	
	$('#closeInfoCont').click(function(){
		$('#infoCont').hide();
	});
	
	$('#infoTrigger1').click(function(){
		$('#infoCont1').show();
	});
	
	$('#closeInfoCont1').click(function(){
		$('#infoCont1').hide();
	});
       $('#infoTrigger2').click(function(){
		$('#infoCont2').show();
	});
	
	$('#closeInfoCont2').click(function(){
		$('#infoCont2').hide();
	});
 $('#infoTrigger3').click(function(){
		$('#infoCont3').show();
	});
	
	$('#closeInfoCont3').click(function(){
		$('#infoCont3').hide();
	});

		
});

$(function() {		
	$('.add_pte_1').on("click",function(){
		var newElement  ='';
		newElement = '<div class="pte_cont_1" >';
			newElement += '<input type="text" name="property_to_exclude_1[]" value="" class="register2 pte_element" > ';			
		newElement += '</div>';
		
		$('#property_new_elements_cont_1').append(newElement);
	});
	$('.remove_pte_1').on("click",function(){
		var noPteElements = $('#property_new_elements_cont_1 .pte_element').length;
		var i = 0;
		$('#property_new_elements_cont_1 .pte_element').each(function(){ 
			if(++i >= noPteElements) $(this).remove();
		});		
	});

});
$(function() {		
	$('.add_pte_2').on("click",function(){
		var newElement  ='';
		newElement = '<div class="pte_cont_2" >';
			newElement += '<input type="text" name="property_to_exclude_2[]" value="" class="register2 pte_element" > ';			
		newElement += '</div>';
		
		$('#property_new_elements_cont_2').append(newElement);
	});
	
	$('.remove_pte_2').on("click",function(){
		var noPteElements = $('#property_new_elements_cont_2 .pte_element').length;
		var i = 0;
		$('#property_new_elements_cont_2 .pte_element').each(function(){ 
			if(++i >= noPteElements) $(this).remove();
		});		
	});

});
	
function isValidMansInfo() {
	isValid = true;
	if(!$('#man_name').val().trim() || $('#man_name').val().trim() == '' ) {
		isValid = false;
	}
	if(!$('#man_address').val().trim() || $('#man_address').val().trim() == '' ) {	
		isValid = false;
	}
	if(!$('#man_pin').val().trim() || $('#man_pin').val().trim() == '' ) {	
		isValid = false;
	}
	if(!$('#man_postort').val().trim() || $('#man_postort').val().trim() == '' ) {	
		isValid = false;
	}
	if(!$('#man_phone').val().trim() || $('#man_phone').val().trim() == '' ) {		
		isValid = false;
	}
	if(!$('#man_email').val().trim() || $('#man_email').val().trim() == '' ) {	
		isValid = false;
	} else if(!IsValidEmail($('#man_email').val())) { 
		isValid = false;
	}	
	if(!$('#man_identity').val().trim() || $('#man_identity').val().trim() == '' ) {	
		isValid = false;
	}
	
	return isValid;
}
	
function isValidForm1() { 
	var isValid = true;
	var errorMsg = 'Obligatoriskt fält';
	if(!$('#man_name').val().trim() || $('#man_name').val().trim() == '' ) {		
		$('#man_name').addClass('error_input');
		$('#error_man_name').html(errorMsg);
		isValid = false;
	}
	if(!$('#man_address').val().trim() || $('#man_address').val().trim() == '' ) {		
		$('#man_address').addClass('error_input');
		$('#error_man_address').html(errorMsg);
		isValid = false;
	}
	if(!$('#man_pin').val().trim() || $('#man_pin').val().trim() == '' ) {		
		$('#man_pin').addClass('error_input');
		$('#error_man_pin').html(errorMsg);
		isValid = false;
	}
	if(!$('#man_postort').val().trim() || $('#man_postort').val().trim() == '' ) {		
		$('#man_postort').addClass('error_input');
		$('#error_man_postort').html(errorMsg);
		isValid = false;
	}
	if(!$('#man_phone').val().trim() || $('#man_phone').val().trim() == '' ) {		
		$('#man_phone').addClass('error_input');
		$('#error_man_phone').html(errorMsg);
		isValid = false;
	}
	if(!$('#man_email').val().trim() || $('#man_email').val().trim() == '' ) {		
		$('#man_email').addClass('error_input');
		$('#error_man_email').html(errorMsg);
		isValid = false;
	} else if(!IsValidEmail($('#man_email').val())) { 		
		errorMsg = 'This is not a valid email';
		$('#man_email').addClass('error_input');
		$('#error_man_email').html(errorMsg);
		isValid = false;
	}	
	if(!$('#man_identity').val().trim() || $('#man_identity').val().trim() == '' ) {		
		$('#man_identity').addClass('error_input');
		$('#error_man_identity').html(errorMsg);
		isValid = false;
	}
	
	if(!$('#women_name').val().trim() || $('#women_name').val().trim() == '' ) {		
		$('#women_name').addClass('error_input');
		$('#error_women_name').html(errorMsg);
		isValid = false;
	}
	if(!$('#women_address').val().trim() || $('#women_address').val().trim() == '' ) {		
		$('#women_address').addClass('error_input');
		$('#error_women_address').html(errorMsg);
		isValid = false;
	}
	if(!$('#women_pin').val().trim() || $('#women_pin').val().trim() == '' ) {		
		$('#women_pin').addClass('error_input');
		$('#error_women_pin').html(errorMsg);
		isValid = false;
	}
	if(!$('#women_postort').val().trim() || $('#women_postort').val().trim() == '' ) {		
		$('#women_postort').addClass('error_input');
		$('#error_women_postort').html(errorMsg);
		isValid = false;
	}
	if(!$('#women_phone').val().trim() || $('#women_phone').val().trim() == '' ) {		
		$('#women_phone').addClass('error_input');
		$('#error_women_phone').html(errorMsg);
		isValid = false;
	}
	if(!$('#women_email').val().trim() || $('#women_email').val().trim() == '' ) {		
		$('#women_email').addClass('error_input');
		$('#error_women_email').html(errorMsg);
		isValid = false;
	} else if(!IsValidEmail($('#women_email').val())) { 		
		errorMsg = 'This is not a valid email';
		$('#women_email').addClass('error_input');
		$('#error_women_email').html(errorMsg);
		isValid = false;
	}	
	
	if(!$('#women_identity').val().trim() || $('#women_identity').val().trim() == '' ) {		
		$('#women_identity').addClass('error_input');
		$('#error_women_identity').html(errorMsg);
		isValid = false;
	}
	
	return isValid;
}

function isValidForm2() {
	var isValid = true;
	var errorMsg = 'Obligatorisk fält';
	if(!$('#cohabiting_date').val().trim() || $('#cohabiting_date').val().trim() == '' || $('#cohabiting_date').val().trim() == '//' ) {		
		$('#cohabiting_date').addClass('error_input');
		$('#error_cohabiting_date').html(errorMsg);
		isValid = false;
	}
	
	return isValid;
}

function isValidForm4() {
    
	var isValid = true;
	var errorMsg = 'Var vänlig och godkänn villkoren om du vill fortsätta din beställning';
	var agreed = $('input[name=agree_terms]:checked').val();	
	if(!agreed || agreed == '0' || agreed == '') {	
		$('#error_agree_terms').html(errorMsg);
		isValid = false;
	}
	
	return isValid;
}

function isValidForm1_withoutMsg() { 
	var isValid = true;
	var errorMsg = 'Obligatorisk fält';
	if(!$('#man_name').val().trim() || $('#man_name').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#man_address').val().trim() || $('#man_address').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#man_pin').val().trim() || $('#man_pin').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#man_postort').val().trim() || $('#man_postort').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#man_phone').val().trim() || $('#man_phone').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#man_email').val().trim() || $('#man_email').val().trim() == '' ) {		
		
		isValid = false;
	} else if(!IsValidEmail($('#man_email').val())) { 		
		
		isValid = false;
	}	
	if(!$('#man_identity').val().trim() || $('#man_identity').val().trim() == '' ) {		
		
		isValid = false;
	}
	
	if(!$('#women_name').val().trim() || $('#women_name').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#women_address').val().trim() || $('#women_address').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#women_pin').val().trim() || $('#women_pin').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#women_postort').val().trim() || $('#women_postort').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#women_phone').val().trim() || $('#women_phone').val().trim() == '' ) {		
		
		isValid = false;
	}
	if(!$('#women_email').val().trim() || $('#women_email').val().trim() == '' ) {		
		
		isValid = false;
	} else if(!IsValidEmail($('#women_email').val())) { 		
		
		isValid = false;
	}	
	
	if(!$('#women_identity').val().trim() || $('#women_identity').val().trim() == '' ) {		
		
		isValid = false;
	}
	return true;
	return isValid;
}

function isValidForm2_withoutMsg() { 
	var isValid = true;
	if(!$('#cohabiting_date').val().trim() || $('#cohabiting_date').val().trim() == '' || $('#cohabiting_date').val().trim() == '//' ) {
		
		isValid = false;
	}
	
	return isValid;
}

function isValidForm3_withoutMsg() {
    
	var isValid = true;
	var agreed = $('input[name=agree_terms]:checked').val();	
	if(!agreed || agreed == '0' || agreed == '') {	
		isValid = false;
	}
	
	return isValid;
}

function prefillReview() { 
	
	if($('#checkboxThreeInput').is(":checked")){
		$('#review_cohabiting').html('JA');
		$('#review_cohabiting_ip').val('JA');
	} 
	else {
		$('#review_cohabiting').html('NEJ');
		$('#review_cohabiting_ip').val('NEJ');
	}

	if($('#checkboxThree2').is(":checked")){
		$('#review_checkboxThree2').html('JA');
		$('#review_checkboxThree2_pi').val('JA');
	} 
	else {
		$('#review_checkboxThree2').html('NEJ');
		$('#review_checkboxThree_pi').val('NEJ');
	}

	// $('.review_cohabiting_date').html($('#cohabiting_date').val());
	// $('.review_cohabiting_date_ip').val($('#cohabiting_date').val());
	
	var purpose = $('input[name=purpose]:checked').val();
	$('.review_purpose').html(purpose);
	$('.review_purpose_ip').val(purpose);

	if(purpose == 'Vi vill helt avtala bort sambolagens regler.') {
		$(".review_property_to_exclude").hide();
		$(".review_property_to_exclude_label").hide();
	} else {
		$(".review_property_to_exclude").show();
		$(".review_property_to_exclude_label").show();
	}
	var ptes_1 = $('.pte_element_1').length;
	console.log(ptes_1);
	if(ptes_1) {
		var pteReviews_1 = '';
		$('.pte_element_1').each(function(){
			if($(this).val()) pteReviews_1 += '<span class="review_pte">'+$(this).val()+'</span><br>';
		});
		$('.review_property_to_exclude').html(pteReviews_1);
	} else $('.review_property_to_exclude_1').html('Nothing specified');

	var ptes_2 = $('.pte_element_2').length;
	if(ptes_2) {
		var pteReviews_2 = '';
		$('.pte_element_2').each(function(){
			if($(this).val()) pteReviews_2 += '<span class="review_pte">'+$(this).val()+'</span><br>';
		});
		$('.review_property_to_exclude_2').html(pteReviews_2);
	} else $('.review_property_to_exclude').html('Nothing specified');
}

function IsValidEmail(email) { 
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}