@extends('index')
@section('page_title', 'Add New Client')

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
<form action="/client/create" id="contact-form" method="POST">
	{{ csrf_field() }}
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Add Job Clients</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="title">Title</label>
							<input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="firstname">First Name</label>
							<input type="text" name="firstname" id="firstname" placeholder="First Name" value="{{ old('firstname') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="surname">Surame</label>
							<input type="text" name="surname" id="surname" placeholder="Surname" value="{{ old('surname') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="partner">Partner</label>
							<input type="text" name="partner" id="partner" placeholder="Name Of Partner" value="{{ old('partner') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="well-light pad mb">
		<div class="form-group form-group_address">
			<h1 class="form-group_title">Client Address</h1>
			<div class="form-group_controls" id="manual-controls-container">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_1">Address Line 1</label>
							<input type="text" name="address_1" id="address_1" placeholder="Address Line 1" value="{{ old('address_1') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_2">Address Line 2</label>
							<input type="text" name="address_2" id="address_2" placeholder="Address Line 2" value="{{ old('address_2') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_3">Address Line 3</label>
							<input type="text" name="address_3" id="address_3" placeholder="Address Line 3" value="{{ old('address_3') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_town">Town</label>
							<input type="text" name="town" id="town" placeholder="Town" value="{{ old('town') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="city">City</label>
							<input type="text" name="city" id="city" placeholder="City" value="{{ old('city') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="postcode">Post Code</label>
							<input type="text" name="postcode" id="postcode" placeholder="Post Code" value="{{ old('postcode') }}">
						</div>
					</div>
					<div class="fr">
						<a href="javascript:void(0)" class="btn btn-txt">Enter Address Manually</a>
						<a href="javascript:void(0)" class="btn btn-sm btn-toggle btn-addressForm-postcode" data-show-id="addressForm">Find Using Postcode</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Client Contact Information</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="landline">Landline</label>
							<input type="text" name="landline" id="landline" placeholder="Landline" value="{{ old('landline') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="mobile">Mobile</label>
							<input type="text" name="mobile" id="mobile" placeholder="Mobile" value="{{ old('mobile') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mb">
		<button class="btn btn-txt" acition="submit">Add Client</button>
	</div>
</form>
@endsection

@section('scripts')
{{-- <script src="/assets/js/combobox.js" type="text/javascript"></script> --}}
{{-- <script src="/assets/js/contact/map.js" type="text/javascript"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANjWsTkK3fNrrdWI5CemHQEOpkChVVgUg&libraries=places&region=GB"
		 async defer></script>
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	// Site.validatorPostcodeMethod(); 
	Site.contactAddressInputSelect(); 
	
	var address = 'wf32hj';
	geocoder.geocode({ 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
		    alert(results[0].formatted_address);
		}
	});
});
</script>
@endsection