@extends('index')
@section('page_title', 'Add New Job')

@section('content')
	@if (count($errors) > 0)
<div class="error pad mb">
    <ul class="m0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/job/create" id="contact-form" method="POST">
	{{ csrf_field() }}
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Add Job Clients</h1>
			<div class="form-group_controls">
				<div class="clients mt">
					<div class="client well-client" id="client_1">
						<div class="row">
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_1">Search Client</label>
									<input type="text" name="client_1" id="client_1" placeholder="Type name of the client" value="{{ old('client_1') }}">
								</div>
							</div>
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_1_job_role">Job Role</label>
									<input type="text" name="client_1_job_role" id="client_1_job_role" placeholder="Type the name of a job role" value="{{ old('client_1_job_role') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="client well-client" id="client_2">
						<div class="row">
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_2">Search Client</label>
									<input type="text" name="client_2" id="client_2" placeholder="Type name of the client" value="{{ old('client_2') }}">
								</div>
							</div>
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_2_job_role">Job Role</label>
									<input type="text" name="client_2_job_role" id="client_2_job_role" placeholder="Type the name of a job role" value="{{ old('client_2_job_role') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="client well-client" id="client_3">
						<div class="row">
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_3">Search Client</label>
									<input type="text" name="client_3" id="client_3" placeholder="Type name of the client" value="{{ old('client_3') }}">
								</div>
							</div>
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_3_job_role">Job Role</label>
									<input type="text" name="client_3_job_role" id="client_3_job_role" placeholder="Type the name of a job role" value="{{ old('client_3_job_role') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="client well-client" id="client_4">
						<div class="row">
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_4">Search Client</label>
									<input type="text" name="client_4" id="client_4" placeholder="Type name of the client" value="{{ old('client_4') }}">
								</div>
							</div>
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_4_job_role">Job Role</label>
									<input type="text" name="client_4_job_role" id="client_4_job_role" placeholder="Type the name of a job role" value="{{ old('client_4_job_role') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="client well-client" id="client_5">
						<div class="row">
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_5">Search Client</label>
									<input type="text" name="client_5" id="client_5" placeholder="Type name of the client" value="{{ old('client_5') }}">
								</div>
							</div>
							<div class="col col12-24">
								<div class="col-inner">
									<label for="client_5_job_role">Job Role</label>
									<input type="text" name="client_5_job_role" id="client_5_job_role" placeholder="Type the name of a job role" value="{{ old('client_5_job_role') }}">
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
		<div class="form-group form-group_address">
			<h1 class="form-group_title">Job Address</h1>
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
							<input type="text" name="address_town" id="address_town" placeholder="Town" value="{{ old('address_town') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_city">City</label>
							<input type="text" name="address_city" id="address_city" placeholder="City" value="{{ old('address_city') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="address_postcode">Post Code</label>
							<input type="text" name="address_postcode" id="postcode" placeholder="Post Code" value="{{ old('address_postcode') }}">
						</div>
					</div>
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
							<div></div>
								<small class="fr">Or <a href="/job/create/" class="btn btn-small">Create New Job Type</a></small>
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
<script src="/assets/js/combobox.js" type="text/javascript"></script>
<script src="/assets/js/contact/map.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANjWsTkK3fNrrdWI5CemHQEOpkChVVgUg&libraries=places&region=GB&callback=initAutocomplete"
		 async defer></script>
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
@endsection