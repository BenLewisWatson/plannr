@extends('index')
@section('page_title', 'Add New Client')
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
	<div class="form-group form-group_client-details show">
		<div class="well-light pad mb">
			<h1 class="form-group_title">Client Details</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="first_name">First Name</label>
							<input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="surname">Surname</label>
							<input type="text" name="surname" id="surname" placeholder="Surname" value="{{ old('surname') }}">
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="title">Title</label>
							<select name="title" id="title">
			  					<option value="mr">Mr</option>
			  					<option value="miss">Miss</option>
			  					<option value="mrs">Mrs</option>
							</select>
						</div>
					</div>
					<div class="col col12-24">
						<div class="col-inner">
							<label for="partner">Partner</label>
							<input type="text" name="partner" id="partnet" placeholder="Partner" value="{{ old('partner') }}">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fr">
			<a href="javascript:void(0)" class="btn btn-form-group-next">Continue</a>
		</div>
	</div>
	<div class="form-group form-group_client-address">
		<div class="well-light pad mb">
			<h1 class="form-group_title">Client Address</h1>
			<div class="form-group_controls">
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
							<label for="town">Town</label>
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
				</div>
			</div>
		</div>

		<div class="fr">
			<a href="javascript:void(0)" class="btn btn-form-group-next">Continue</a>
		</div>
	</div>
	<div class="form-group form-group_client-contact">
		<div class="well-light pad mb">
			<h1 class="form-group_title">Client Contact Information</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="landline">Landline</label>
							<input type="text" name="landline " id="landline" placeholder="Landline">
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

		<div class="fr">
			<a href="javascript:void(0)" class="btn btn-form-group-next">Continue</a>
		</div>
	</div>
	<div class="form-group form-group_job-details">
		<div class="well-light pad mb">
			<h1 class="form-group_title">Job Details</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col12-24">
						<div class="col-inner">
							<label for="quote">Quote</label>
							<input type="text" name="quote " id="quote" placeholder="Quote">
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
							<small class="fr">Or <a href="/job/create/" class="btn btn-small">Create New Job Type</a></small>
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
<script src="/assets/js/combobox.js" type="text/javascript"></script>
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
@endsection