// initialise

var currentpage = 1;
$( '#page-1' ).fadeIn();
showrelevantbuttons();
// ************

$( '#next-button' ).click( function() {
	currentpage = currentpage+1;
	showrelevantbuttons();
	$( '.register-tab:visible' ).fadeOut(200, function() {
		$( '#circles .circle').removeClass('full');
		$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
		$( '#page-' + currentpage ).fadeIn(200);
	});
});

$( '#back-button' ).click( function() {
	currentpage = currentpage-1;
	showrelevantbuttons();
	$( '.register-tab:visible' ).fadeOut(200, function() {
		$( '#circles .circle').removeClass('full');
		$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
		$( '#page-' + currentpage ).fadeIn(200);
	});
});

function showrelevantbuttons()
{
	if (currentpage == 1) {
		$( '#add-licence-button' ).hide();
		$( '#back-button' ).hide();
		$( '#next-button' ).show();
		$( '#register-button' ).hide();
	} else if (currentpage == 8) {
		$( '#add-licence-button' ).hide();
		$( '#back-button' ).show();
		$( '#next-button' ).hide();
		$( '#register-button' ).show();
	} else if (currentpage == 4) {
		$( '#add-licence-button' ).show();
		$( '#back-button' ).show();
		$( '#next-button' ).show();
		$( '#register-button' ).hide();
	} else {
		$( '#add-licence-button' ).hide();
		$( '#back-button' ).show();
		$( '#next-button' ).show();
		$( '#register-button' ).hide();
	}
}

$( '#register-button, #update-button' ).click( function() {
	$( '#register-form' ).submit();
});

var donotsubmit;

$( 'form' ).submit(function( e ) {
	donotsubmit = false;
	$( this ).find( '.datepicker' ).each( function() {
		var theukformat = $( this ).val();
		if ( /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/.test(theukformat) || theukformat == "" )
		{
			//do nada
		}
		else
		{
			var thistextbox = $( this );
			currentpage = $( this ).closest( '.register-tab' ).index() +1;
			showrelevantbuttons();
			$( '.register-tab:visible' ).fadeOut(200, function() {
				$( '#circles .circle').removeClass('full');
				$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
				$( '#page-' + currentpage ).fadeIn(200, function() {
					$( thistextbox ).focus();
				});
			});
			alert("This date is in the wrong format! dd/mm/yyyy!");
			e.preventDefault();
			donotsubmit = true;
			return false;
		}
		
		theukformat = theukformat.split('/');
		var thecorrectformat = theukformat[2] + "-" + theukformat[1] + "-" + theukformat[0];
		//$( this ).val( thecorrectformat );
	});
});

$( '#register-form' ).submit(function( e ) {
	if (!donotsubmit) {
		if ( $( "#email" ).val() != $( "#email-confirm" ).val() )
		{
			currentpage = 1;
			showrelevantbuttons();
			$( '.register-tab:visible' ).fadeOut(200, function() {
				$( '#circles .circle').removeClass('full');
				$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
				$( '#page-' + currentpage ).fadeIn(200, function() {
					$( "#email" ).focus();
				});
			});
			
			e.preventDefault();
			alert("Email addresses do not match." );
			return false;
		}
		
		if ( $( "#password" ).val() != $( "#password-confirm" ).val() )
		{
			currentpage = 8;
			showrelevantbuttons();
			$( '.register-tab:visible' ).fadeOut(200, function() {
				$( '#circles .circle').removeClass('full');
				$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
				$( '#page-' + currentpage ).fadeIn(200, function() {
					$( "#password" ).focus();
				});
			});
			
			e.preventDefault();
			alert("Passwords do not match." );
			return false;
		}
		
		$( '#password' ).keyup();
		if ( $( "#pw-strength" ).html() != "GOOD!" && $( 'body' ).hasClass('register') )
		{
			currentpage = 8;
			showrelevantbuttons();
			$( '.register-tab:visible' ).fadeOut(200, function() {
				$( '#circles .circle').removeClass('full');
				$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
				$( '#page-' + currentpage ).fadeIn(200, function() {
					$( "#password" ).focus();
				});
			});
			
			e.preventDefault();
			alert("Password isn't strong enough. Please use a capital letter, a number and at least 8 characters." );
			return false;
		}
		
		var invalid = false;
		$( ".form-element label:contains('*')" ).each(function() {
			// *************************************************************************************
			// THIS NEEDS TO CHANGE TO CATER FOR PROP SELECTED INDEX INSTEAD OF VAL FOR SELECT BOXES
			// *************************************************************************************
			if ($(this).parent().find('input,select,textarea').val() == "" && (!($(this).parent().find('.element').hasClass('not-required'))) )
			{
				var thistextbox = $(this).parent().find('input,select,textarea');
				currentpage = $( this ).closest( '.register-tab' ).index() +1;
				showrelevantbuttons();
				$( '.register-tab:visible' ).fadeOut(200, function() {
					$( '#circles .circle').removeClass('full');
					$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
					$( '#page-' + currentpage ).fadeIn(200, function() {
						$( thistextbox ).focus();
					});
				});
				
				e.preventDefault();
				var thisname = $(this).html().replace(/[^a-z0-9\s]/gi, '').trim();
				alert(thisname + " is required." );
				invalid = true;
				return false;
			}
		});
		
		if (invalid)
			return false;
		
		if (!$('body.edit-profile').length)
		{
			var googleResponse = jQuery('#g-recaptcha-response').val();
			if (!googleResponse) {
				alert("Please tick the 'I'm not a robot' checkbox.");
				e.preventDefault();
				return false;
			}
		}
		
		
		
		$( this ).find( '.datepicker' ).each( function() {
			var theukformat = $( this ).val();
			if ( /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/.test(theukformat) || theukformat == "" )
			{
				//do nada
			}
			else
			{
				var thistextbox = $( this );
				currentpage = $( this ).closest( '.register-tab' ).index() +1;
				showrelevantbuttons();
				$( '.register-tab:visible' ).fadeOut(200, function() {
					$( '#circles .circle').removeClass('full');
					$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
					$( '#page-' + currentpage ).fadeIn(200, function() {
						$( thistextbox ).focus();
					});
				});
				alert("This date is in the wrong format! dd/mm/yyyy!");
				e.preventDefault();
				donotsubmit = true;
				return false;
			}
			
			theukformat = theukformat.split('/');
			var thecorrectformat = theukformat[2] + "-" + theukformat[1] + "-" + theukformat[0];
			$( this ).val( thecorrectformat );
		});
	}
});


$( 'select' ).change( function() {
	if($(this).val() == 'other'){
		$(this).parent().find('input.other').show();
	} else {
		$(this).parent().find('input.other').hide();
	}
});

$( '.circle, #circles .btn' ).click( function() {
	if ( $(this).hasClass("full") )
	{
		//do nada
	} else {
		currentpage = $(this).index()+1;
		showrelevantbuttons();
		$( '.register-tab:visible' ).fadeOut(200, function() {
			$( '#circles .circle').removeClass('full');
			$( '#circles .circle:nth-child(' + currentpage + ')').addClass('full');
			$( '#page-' + currentpage ).fadeIn(200);
		});
		
		if ($( window ).width() <= 800) {
			$('html, body').animate({ scrollTop: $("#register-form").offset().top }, 1000);
			$( '#circles' ).slideUp();
		}
	}
});

$( '#add-licence-button' ).click(function() {
	var currentcount = $( '#all-licences .licence' ).length;
	console.log(currentcount);
	$( '#all-licences .licence:nth-child(1)' ).clone().appendTo( "#all-licences" ).find( "input" ).val("").closest(".licence").find( "select" ).prop('selectedIndex',0).closest(".licence").find("h3").html( "LICENCE " + (currentcount+1) + "<span class='remove-licence'><i class='fa fa-minus-circle'></i></span>" ).closest(".licence").find( ".licenceID" ).remove();
});

$("#all-licences").on("click", ".remove-licence", function(){
	$( this ).closest( '.licence' ).remove();
});

$( '.save-experience' ).click(function(){
	var content = '';
	content = content + '<input type="hidden" name="exp-aircraft-type[]" value="' + $('#add-aircraft-type').val() + '">';
	content = content + '<input type="hidden" name="exp-captain-time[]" value="' + $('#add-captain-time').val() + '">';
	content = content + '<input type="hidden" name="exp-firstofficer-time[]" value="' + $('#add-firstofficer-time').val() + '">';
	content = content + '<input type="hidden" name="exp-instructor-time[]" value="' + $('#add-instructor-time').val() + '">';
	content = content + '<input type="hidden" name="exp-dateoflastflight[]" value="' + $('#add-dateoflastflight').val() + '">';
	content = content + '<div class="my-exp"><span class="remove-exp"><i class="fa fa-minus-circle"></i></span> ' + $('#add-aircraft-type').val() + '</div>';
	
	$( '#my-experiences' ).append( content );
	
	$('#add-aircraft-type').prop('selectedIndex',0);
	$('#add-captain-time').val('');
	$('#add-firstofficer-time').val('');
	$('#add-instructor-time').val('');
	$('#add-dateoflastflight').val('');
});

$("#my-experiences").on("click", ".remove-exp", function(){
	$( this ).closest( '.my-exp' ).remove();
});

$( '.save-instructor-experience' ).click(function(){
	var content = '';
	content = content + '<input type="hidden" name="instr-exp-instructor-aircraft-type[]" value="' + $('#instructor-aircraft-type').val() + '">';
	content = content + '<input type="hidden" name="instr-exp-training-type[]" value="' + $('#training-type').val() + '">';
	var thecompany = '';
	if ($('#airline-company').val() == "other")
		thecompany = $('#airline-company-other').val();
	else
		thecompany = $('#airline-company').val();

	content = content + '<input type="hidden" name="instr-exp-airline-company[]" value="' + thecompany + '">';
	
	content = content + '<div class="my-instr-exp"><span class="remove-instr-exp"><i class="fa fa-minus-circle"></i></span> ' + thecompany + '</div>';
	
	$( '#my-instructor-experiences' ).append( content );
	
	$('#instructor-aircraft-type').prop('selectedIndex',0);
	$('#training-type').prop('selectedIndex',0);
	$('#airline-company').prop('selectedIndex',0);
	$('#airline-company-other').val('').hide();
});

$("#my-instructor-experiences").on("click", ".remove-instr-exp", function(){
	$( this ).closest( '.my-instr-exp' ).remove();
});

$( '.save-emp-experience' ).click(function(){
	var content = '';
	var thecompany = '';
	if ($('#history-airline-company').val() == "other")
		thecompany = $('#history-airline-company-other').val();
	else
		thecompany = $('#history-airline-company').val();
	
	content = content + '<input type="hidden" name="exp-history-airline-company[]" value="' + thecompany + '">';
	content = content + '<input type="hidden" name="exp-history-from[]" value="' + $('#history-from').val() + '">';
	content = content + '<input type="hidden" name="exp-history-to[]" value="' + $('#history-to').val() + '">';
	content = content + '<input type="hidden" name="exp-history-position[]" value="' + $('#history-position').val() + '">';
	content = content + '<input type="hidden" name="exp-history-leaving[]" value="' + $('#history-leaving').val() + '">';
	
	content = content + '<div class="my-emp-exp"><span class="remove-emp-exp"><i class="fa fa-minus-circle"></i></span> ' + thecompany + '</div>';
	
	$( '#my-emp-experiences' ).append( content );
	
	$('#history-airline-company').prop('selectedIndex',0);
	$('#history-airline-company-other').val('').hide();
	$('#history-from').val('');
	$('#history-to').val('');
	$('#history-position').prop('selectedIndex',0);
	$('#history-leaving').val('');
});

$("#my-emp-experiences").on("click", ".remove-emp-exp", function(){
	$( this ).closest( '.my-emp-exp' ).remove();
});

$( '#password' ).keyup(function() {
	checkpwstrength();
});

function checkpwstrength()
{
	var matches = $('#password').val().match(/\d+/g);
	var hasnumber = false;
	if (matches != null) {
		hasnumber = true;
	}

	
	var strength = 0;
	if ( hasnumber ) {
		//console.log( "1 for having a number");
		strength = strength + 1;
	}
	if ( $('#password').val().length >= 8 ) {
		//console.log( "1 for longer than 7 chars");
		strength = strength + 1;
	}
	if ( $('#password').val().toLowerCase() != $('#password').val() ) {
		//console.log( "1 for having an upper case");
		strength = strength + 1;
	}
	
	if (strength == 0) {
		$( '#pw-strength' ).html("FAR TOO WEAK");
		$( '#pw-strength' ).css( "background-color","#ff0000");
	} else if (strength == 1) {
		$( '#pw-strength' ).html("WEAK");
		$( '#pw-strength' ).css( "background-color","#ff9c00");
	} else if (strength == 2) {
		$( '#pw-strength' ).html("ALMOST");
		$( '#pw-strength' ).css( "background-color","#ffff00");
	} else if (strength == 3) {
		$( '#pw-strength' ).html("GOOD!");
		$( '#pw-strength' ).css( "background-color","#00ff00");
	}
}

$( '.update-prof-pic' ).click( function() {
	var content = "";
	content = content + "<iframe src='jquery_upload_crop/upload_crop.php' style='width:100%; height:100%;'></iframe>";
	
	showlightbox(content)
});

$( '.upload-video' ).click( function() {
	var content = "";
	content = content + "<input type='hidden' name='type' value='vid'>";
	content = content + "<div class='half'>";
	content = content + "<form action='inc/upload-file.php' method='post' enctype='multipart/form-data'>";
	content = content + "<h1>Upload From PC</h1><input type='hidden' name='type' value='vid'><input type='file' name='doc-from-pc' class='vid-from-pc' accept='video/mp4,video/x-m4v,video/*'><div class='ajax-spinner'></div></form></div>";
	content = content + "<script>$('.vid-from-pc').change(function(){ $( this ).closest( 'form' ).find( '.ajax-spinner' ).show(); $( this ).closest( 'form' ).submit(); });</script>";
	content = content + "<div class='half'>";
	content = content + "<form action='inc/upload-ytvid.php' method='post'>";
	content = content + "<h1>Youtube</h1>URL:<br><input type='text' name='youtube-url' placeholder='e.g. https://www.youtube.com/watch?v=C_jYnyVF508'>";
	content = content + "<br><input type='submit'>";
	content = content + "</form></div>";
	
	showlightbox(content)
});

$( '.upload-documents' ).click( function() {
	var content = "";
	content = content + "<form action='inc/upload-file.php' method='post' enctype='multipart/form-data'>";
	content = content + "<input type='hidden' name='type' value='doc'>";
	content = content + "<div class='half'><h1>Upload From PC</h1><input type='file' name='doc-from-pc' class='doc-from-pc' accept='application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*'><div class='ajax-spinner'></div></form></div>";
	content = content + "<script>$('.doc-from-pc').change(function(){ $( this ).closest( 'form' ).find( '.ajax-spinner' ).show(); $( this ).closest( 'form' ).submit(); });</script>";
	content = content + "</form>";
	
	showlightbox(content)
});

$( '.add-references' ).click( function() {
	var content = "";
	content = content + "<form action='inc/add-reference.php' method='post' enctype='multipart/form-data'>";
	content = content + "<div class='form-element'>";
	content = content + "	<label for='ref-company-name'>";
	content = content + "		Company Name:";
	content = content + "	</label>";
	content = content + "	<div class='element'>";
	content = content + "		<input type='text' name='ref-company-name' id='ref-company-name'>";
	content = content + "	</div>";
	content = content + "</div>";
	content = content + "<div class='form-element'>";
	content = content + "	<label for='ref-staff-name'>";
	content = content + "		Staff Name:";
	content = content + "	</label>";
	content = content + "	<div class='element'>";
	content = content + "		<input type='text' name='ref-staff-name' id='ref-staff-name'>";
	content = content + "	</div>";
	content = content + "</div>";
	content = content + "<div class='form-element'>";
	content = content + "	<label for='ref-contact-no'>";
	content = content + "		Contact Number:";
	content = content + "	</label>";
	content = content + "	<div class='element'>";
	content = content + "		<input type='text' name='ref-contact-no' id='ref-contact-no'>";
	content = content + "	</div>";
	content = content + "</div>";
	content = content + "<div class='form-element'>";
	content = content + "	<label for='ref-email-address'>";
	content = content + "		Email:";
	content = content + "	</label>";
	content = content + "	<div class='element'>";
	content = content + "		<input type='email' name='ref-email' id='ref-email'>";
	content = content + "	</div>";
	content = content + "</div>";
	content = content + "<input type='submit' value='Add' class='btn'>";
	content = content + "</form>";
	
	showlightbox(content)
});

$( '#backdrop' ).click( function() {
	hidelightbox();
});

function showlightbox(content) {
	$( '#lightbox' ).html( content );
	$( '#lightbox' ).fadeIn();
	$( '#backdrop' ).fadeIn();
}

function hidelightbox() {
	$( '#lightbox' ).fadeOut();
	$( '#backdrop' ).fadeOut();
}

$( '#open-menu' ).click( function() {
	if($('#circles').is(':visible'))
		$( '#circles' ).slideUp();
	else
		$( '#circles' ).slideDown();
});