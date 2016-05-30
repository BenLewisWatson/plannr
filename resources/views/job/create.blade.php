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
<form action="/job/create" id="form-addJob" method="POST">
	{{ csrf_field() }}
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Job Details</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col24-24">
						<div class="col-inner">
							<label for="title">Title</label>
							<input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="date">Job Date</label>
							<input type="text" name="date-picker" id="date-picker" class="date-picker_input" autocomplete="off" placeholder="Select The Date Of The Job" value="{{ old('date-picker') }}">
							<input type="text" name="date" id="date" class="date" hidden value="{{ old('date') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="quote">Quote</label>
							<div class="input-group">
								<span class="input-group_prefix">
									<i class="fa fa-gbp"></i>
								</span>
								<input type="text" name="quote" id="quote" class="input-currency input-currency-gbp" autocomplete="off" placeholder="1000" value="{{ old('quote') }}">
							</div>
						</div>
					</div>
					<div class="col col24-24">
						<div class="col-inner">
							<label for="description">Description</label>
							<textarea type="text" name="description" id="description" class="wysiwyg" value="{{ old('description') }}"></textarea>
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="job_type">Job Type</label>
							<select name="job_type" id="job_type">
			  					<option value="Residential">Residential</option>
			  					<option value="Commercial">Commercial</option>
			  					<option value="Other">Other</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
									<input type="text" name="client[]" id="client_1_name" class="client-id-field" placeholder="Search for a client">
								</div>
							</div>
							<div class="col col10-24">
								<div class="col-inner">
									<label for="client_1_role">Job Role</label>
									<input type="text" name="client_role[]" id="client_1_role" class="client-role-field" placeholder="Search for a client job role">
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
			</div>
		</div>
	</div>

	<div class="well-light pad mb cf" id="addressForm">
		<div class="form-group form-group_address">
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
							<input type="text" name="address_3" id="address_3" class="address_input" placeholder="Address Line 3" value="{{ old('address_3') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="town">Town</label>
							<input type="text" name="town" id="town" class="address_input" placeholder="Village/Town Name" value="{{ old('town') }}">
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
							<input type="text" name="email" id="email" placeholder="Email" value="{{ old('Email Address') }}">
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
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/sortable.js" type="text/javascript"></script>
<script src="/assets/js/plugins/rome.min.js" type="text/javascript"></script>
<script src="/assets/js/addJob.js" type="text/javascript"></script>
@endsection