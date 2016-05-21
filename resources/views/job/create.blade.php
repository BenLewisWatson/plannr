@extends('index')
@section('page_title', 'Add New Job')

@section('content')
@if (count($errors) > 0)
<div class="error pad mb">
	<h2>There were errors with the details you submitted.</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/job/create" id="form-addClient" method="POST">
	{{ csrf_field() }}
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Add Job Clients</h1>
			<p>The primary client and their job role should be positioned at the top. To re-order clients hold and drag them in to place.</p>
			<div class="form-group_controls">
				<div class="clients mt">
					<div class="client well-client" id="client_1">
						<div class="row">
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_1_name">Search Client</label>
									<div class="client-search">
										<input type="text" name="client-search_input" class="client-search_input" placeholder="Type name of the client" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
										<div class="client-search_results"><ul></ul></div>
									</div>
									<input type="text" hidden name="client[]" id="client_1_name" class="client-id-field">
								</div>
							</div>
							<div class="col col10-24">
								<div class="col-inner">
									<label for="client_1_role">Job Role</label>
									<input type="text" name="client_role[]" id="client_1_role" placeholder="Type the name of a job role">
								</div>
							</div>
							<div class="col col2-24">
								<div class="col-inner">
									<div class="client_controls">
										<div>
											<a href="javascript:void(0)" class="client_btn-add"><i class="fa fa-fw fa-plus-circle" aria-hidden="true"></i></a>
										</div>
										<div>
											<i class="fa fa-fw fa-sort" aria-hidden="true"></i>
										</div>
										<div>
											<a href="javascript:void(0)" class="client_btn-remove"><i class="fa fa-fw fa-minus-circle" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a href="javascript:void(0)" class="btn btn-add-client">Add New Client</a>
			</div>
		</div>
	</div>
	
	<div class="well-light pad mb">
		<div class="tc">
			<div class="row">
				<div class="col col8-24">
					<div class="col-inner">
						<a href="javascript:void(0)" class="btn btn-sm btn-toggle btn-ClientAddress" data-show-id="useClientAddress">Use Primary Client Address</a>
						<input type="checkbox" hidden name="useClientAddress_checkbox" id="useClientAddress_checkbox">
					</div>
				</div>
				<div class="col col8-24">
					<div class="col-inner">
						<a href="javascript:void(0)" class="btn btn-sm btn-toggle btn-addressForm-fullAddress" data-show-id="addressForm">Add Job Address</a>
					</div>
				</div>
				<div class="col col8-24">
					<div class="col-inner">
						<a href="javascript:void(0)" class="btn btn-sm btn-toggle btn-addressForm-postcode" data-show-id="addressForm">Find Using Postcode</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="well-light pad mb" id="useClientAddress">
		<h1>Job Address</h1>
		Using Primary Client's Address.
	</div>

	<div class="well-light pad mb cf" id="addressForm">
		<div class="form-group form-group_address form-group_address_postcode-only">
			<h1 class="form-group_title">Job Address</h1>
			<div class="form-group_controls" id="manual-controls-container">
				<div class="row mt">
					<div class="col col12-24 col-postcode">
						<div class="col-inner">
							<label for="address_1">Address Line 1</label>
							<input type="text" name="address_1" id="address_1" class="address_input" placeholder="House Name/Number or Company Name" value="{{ old('address_1') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_2">Address Line 2</label>
							<input type="text" name="address_2" id="address_2" class="address_input" placeholder="Street Name" value="{{ old('address_2') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_3">Address Line 3</label>
							<input type="text" name="address_3" id="address_3" class="address_input" placeholder="Village/Area Name" value="{{ old('address_3') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="town">Town</label>
							<input type="text" name="town" id="town" class="address_input" placeholder="Town" value="{{ old('town') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="city">City</label>
							<input type="text" name="city" id="city" class="address_input" placeholder="City" value="{{ old('city') }}">
						</div>
					</div>
					<div class="col col12-24 col-postcode">
						<div class="col-inner">
							<label for="postcode">Post Code</label>
							<input type="text" name="postcode" id="postcode" class="address_input" placeholder="Post Code" value="{{ old('postcode') }}">
						</div>
					</div>
				</div>
				<div class="fr">
					<a href="javascript:void(0)" class="btn btn-find-postcode">Find Address</a>
				</div>
			</div>
		</div>
	</div>
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Job Contact Information</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="landline">Landline</label>
							<input type="text" name="landline" id="landline" placeholder="Landline">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="mobile">Mobile</label>
							<input type="text" name="mobile" id="mobile" placeholder="Mobile">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" placeholder="Email">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Job Details</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="quote">Quote</label>
							<input type="text" name="quote" id="quote" placeholder="Quote">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="job_type">Job Type</label>
							<select name="job_type" id="job_type">
			  					<option value="mr">Residential</option>
			  					<option value="miss">Commercial</option>
			  					<option value="mrs">Other</option>
							</select>
							<div>
								<small class="fr">Or <a href="/job/create/" class="btn btn-small">Create New Job Type</a></small>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="mb">
		<button class="btn btn-txt" acition="submit">Add Job</button>
	</div>
</form>
@endsection

@section('scripts')
{{-- <script src="/assets/js/contact/map.js" type="text/javascript"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANjWsTkK3fNrrdWI5CemHQEOpkChVVgUg&region=GB?sensor=false"
		 async defer></script>
<script src="/assets/js/plugins/unibox.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/sortable.js" type="text/javascript"></script>
<script src="/assets/js/plugins/quicksearch.js" type="text/javascript"></script>
<script>
Site.validatorPostcodeMethod(); 

var btnToggle;

function updateAddressFields(address) {
	if ($('input#postcode').valid() && $('input#postcode').val().length > 4) {
		$.ajax({
			url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+address+'&key=AIzaSyC_QDIIVFCWhNpOZrzxp1D2gMo5r18v6r8',
			timeout: 100,
			success: function(data) {
				if (data.status == "200" || data.status == "OK") {
					if (data.results[0].types[0] == "postal_code") {
						$('input#address_2').val(data.results[0].address_components[1].long_name);
						$('input#town').val(data.results[0].address_components[2].long_name);
						$('input#city').val(data.results[0].address_components[3].long_name);
					}
				}
			}
		});
	}
}

$(document).ready(function() {
	// Validation
	$("#form-addClient").validate({
	    ignore: "input.address_input:hidden",
		rules: {
			'client[]': {
				required: true,
			},
			address_1: {
				required: true,
			},
			address_2: {
				required: true,
			},
			city: {
				required: true,
			},
			postcode: {
				postcode: true
			},
			email: {
				required: true,
				email: true
			},
			quote: {
				digits: true
			},
		}
	});

	// Find Address Using Postcode Button
	$('.btn-find-postcode').on("click", function() {
		updateAddressFields($('input#postcode').val());
		$('.form-group_address.form-group_address_postcode-only').removeClass('form-group_address_postcode-only');
		$("#form-addClient").validate();
	});

	// Re-order clients
	Sortable.create($('.clients')[0], {
		  ghostClass: "client-ghost"
	});

	// Add/Remove Client Button Variables
	clientResultUID = 1;
	clientCount = 1;

	// Remove Client
	$('.client .client_btn-remove').click(function() {
		if (clientCount > 1) {
			$(this).closest('.client').slideUp(function() { $(this).remove(); });
			clientCount--;
		}
	});

	// Add Client
	$('.client .client_btn-add, .btn-add-client').click(function() {
		if (clientCount <= 9) {
			clientCount++;
			clientResultUID++;
			clonedClient = $('.clients .client:first').clone(true);

			// Update Container ID
			$(clonedClient).attr('id','client_'+clientResultUID);
			// Reset Input Values
			$(clonedClient).find('input').val('');
			// Update Name ID's
			$(clonedClient).find('#client_1_name').attr('id','client_'+clientResultUID+'_name');
			$(clonedClient).find('[for=client_1_name]').attr('for','client_'+clientResultUID+'_name');
			// Update Role ID's
			$(clonedClient).find('#client_1_role').attr('id','client_'+clientResultUID+'_role');
			$(clonedClient).find('[for=client_1_role]').attr('for','client_'+clientResultUID+'_role');

			cloned = null;

			if ($(this).hasClass('client_btn-add')) {
				cloned = $(this).closest('.client').after(clonedClient).next();
				cloned.slideDown();
			}
			else {
				cloned = clonedClient.appendTo('.clients');
				cloned.slideDown();
			}

			// Add validation rule
			console.log(cloned);
			cloned.rules('add', {'required': true});
		}
		else {
			sweetAlert('You can only have 10 clients per project');
		}
	});

	// Client
	$('input.client-search_input').on('input', function() {
		search_results = $(this).next('.client-search_results');
		search_results_ul = search_results.find('ul');
		if ($(this).val().length > 2) {
			$.ajax({
			    type: 'GET',
			    url: '/api/search/client/'+encodeURI($(this).val()),
			    success: function (data) {
			    	if (data.length) {
 						search_results_ul.empty();
				        for (var i = 0; i < data.length; i++) {		        	
				        	search_results_ul.append('<li class="result" data-client-id="'+data[i].id+'">'+data[i].firstname+' '+data[i].surname+'</li>');
				        }
		        		search_results.show();
			    	}
			    	else {
				        search_results.hide();
			    	}
			    }
			});
		}
		else {
	        search_results.hide();
		}
	});

	// Client Search - Focus Out
	$('input.client-search_input').on('focusout', function(e) {
		resultsContainer = $(this).parent('.client-search').find('.client-search_results').first();
		resultsContainer.fadeOut(function() {
	 		resultsContainer.find('ul').empty();
		});
	});

	// Client Search - Results - Select Option
	$(document).on("click", '.result', function(e) { 
		// Select fields
		searchField = $(this).closest('.client-search').find('.client-search_input').first();
		clientIdField = $(this).closest('.client-search').next('.client-id-field');
		// Update fields
		clientIdField.val($(this).data('client-id'));
		searchField.val($(this).text());
		// Refocus on search box
		searchField.focus();
	});

	// Hides element with id specified using data-show-id atribute
	$('.btn-toggle').click(function(e) {
		e.preventDefault();
		if (btnToggle != null) {
			btnToggle.slideUp();
		}
		if ($(this).data('show-id') != "") {
			btnToggle = $("#"+$(this).data('show-id')).slideToggle();
		}
	});

	// Check useClientAddress checkbox
	$('.btn-ClientAddress').click(function() {
		$('input#useClientAddress_checkbox').prop('checked', true);
	});

	// Check useClientAddress checkbox and removes form-group_address_postcode-only
	$('.btn-addressForm-fullAddress').click(function() {
		$('input#useClientAddress_checkbox').prop('checked', false);
		$('.form-group_address.form-group_address_postcode-only').removeClass('form-group_address_postcode-only');
	});

	// Check useClientAddress checkbox and removes form-group_address_postcode-only
	$('.btn-addressForm-postcode').click(function() {
		$('input#useClientAddress_checkbox').prop('checked', false);
		$('.form-group_address').addClass('form-group_address_postcode-only');
	});

});
</script>
@endsection