$(function(){

	//initialize tabs
	$( "#tabs" ).tabs();

	//selected radio button open options
	$('input[type="radio"][data-toggle]').change(function(){
		var elem = $(this).data('toggle'); console.log(elem);

		$('.sub-area').hide();
		$('#'+elem).fadeIn(300);
	});

	//open SIC category tab
	$('table#sic-codes tr.section').click(function(){
		var elem = $(this).data('toggle');
		var _this = $(this);

		if(!$(this).hasClass('open')) {
			$(this).addClass('open');
			$('table#sic-codes').find('tr.'+elem).slideDown(300, function(){
				_this.find('td:first-child span strong').text('‒');
			});
		}
		else {
			$(this).removeClass('open');
			$('table#sic-codes').find('tr.'+elem).slideUp(300, function(){
				_this.find('td:first-child span strong').text('+');
			});
		}
	});

	//select all company type checkbox
	$('input[type="checkbox"][name="company_type_all"]').change(function(){
		var isChecked = $(this).is(':checked');
		var elem = $(this).data('toggle');

		if(isChecked) {
			$('input[type="checkbox"][name="'+elem+'"]').prop('checked', true);
		}
		else {
			$('input[type="checkbox"][name="'+elem+'"]').prop('checked', false);
		}
	});

	//remove All selection when one company type is unchecked
	$('input[type="checkbox"][name="company_type"]').change(function(){
		var isChecked = $(this).is(':checked');

		if(!isChecked) {
			$('input[type="checkbox"][name="company_type_all"]').prop('checked', false);
		}
	});

	//formatting number
	$(".format-number").keydown(function (e) {
	    // Allow: backspace, delete, tab, escape, enter and .
	    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	        // Allow: Ctrl+A
	        (e.keyCode == 65 && e.ctrlKey === true) ||
	        // Allow: home, end, left, right
	        (e.keyCode >= 35 && e.keyCode <= 39)) {
	            // let it happen, don't do anything
	            return;
	    }
	    // Ensure that it is a number and stop the keypress
	    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	        e.preventDefault();
	    }

	});
	$('.format-number').keyup(function(){
		// skip for arrow keys
		if(event.which >= 37 && event.which <= 40){
		   return;
		}

		$(this).val(function(index, value) {
	      	value = value.replace(/,/g,'');
	      	return numberWithCommas(value);
		});
	});

	//return maximum input value is more than the max amount
	$('input.max-value').keyup(function(){
		var max = $(this).data('max');
		var amount = $(this).val().replace(',', ""); console.log(amount)
		if(amount > max) {
			$(this).val(numberWithCommas(max));
			alert('Maximum value allowed is '+ numberWithCommas(max));
		}
	});

});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}