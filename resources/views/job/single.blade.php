@section('page_title', 'Job - '.$job->clients()->find($job->primary_role)->firstname)

@extends('index')
@section('content')
<div class="controls tr">
	<a href="/job/delete/1" class="btn btn-light"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Save Changes</a>
	<a href="/job/delete/1" class="btn btn-error"><i class="fa fa-trash fa-fw"></i> Delete Job</a>
</div>
<div class="tabs well-light">
	<div class="tab_header cf">
		<a href="javascript:void(0)" class="tab_select-btn tab_select-btn-active" data-tab-id="general"><i class="fa fa-info-circle fa-fw"></i> General</a>
		<a href="javascript:void(0)" class="tab_select-btn" data-tab-id="location"><i class="fa fa-location-arrow fa-fw"></i> Address</a>
	</div>
	<div class="tabbed_content">
		<div class="tab pad tab-active" data-tab-id="general">
			<div class="row">
				<div class="col col6-24">
					<div class="col-inner">
						<label for="prmary_role">Primary Client</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="primary_role" id="primary_role" placeholder="No Primary Client Set" value="{{ $job->clients()->find($job->primary_role)->firstname }}" disabled="disabled">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="date">Date</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="date" id="date" placeholder="No Date Set" value="{{ $job->date }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="quote">Quote</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="quote" id="quote" placeholder="No Quote Set" value="{{ $job->quote }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="job_type">Job Type</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="job_type" id="job_type" placeholder="No Job Type Set" value="{{ $job->job_type }}">
					</div>
				</div>
			</div>
		</div>
		<div class="tab pad" data-tab-id="location">
			<div class="row">
				<div class="col col6-24">
					<div class="col-inner">
						<label for="address_1">Address Line 1</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="address_1" id="address_1" placeholder="No Address Line 1 Set" value="{{ $job->address_1 }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="address_2">Address Line 2</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="address_2" id="address_2" placeholder="No Address Line 2 Set" value="{{ $job->address_2 }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="address_3">Address Line 3</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="address_3" id="address_3" placeholder="No Address Line 3 Set" value="{{ $job->address_3 }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="town">Town</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="town" id="town" placeholder="No Town Set" value="{{ $job->town }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="city">City</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="city" id="city" placeholder="No City Set" value="{{ $job->city }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="county">County</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="county" id="county" placeholder="No County Set" value="{{ $job->county }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="postcode">Postcode</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="postcode" id="postcode" placeholder="No Postcode Set" value="{{ $job->postcode }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="country">Country</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="country" id="country" placeholder="No Country Set" value="{{ $job->country }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection