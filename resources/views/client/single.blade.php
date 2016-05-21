@section('page_title', $client->firstname.' '.$client->surname.'\'s Profile')

@extends('index')

@section('content')
<div class="tabs well-light">
	<div class="tab_header cf">
		<a href="javascript:void(0)" class="tab_select-btn tab_select-btn-active" data-tab-id="general"><i class="fa fa-user fa-fw"></i> General</a>
		<a href="javascript:void(0)" class="tab_select-btn" data-tab-id="location"><i class="fa fa-location-arrow fa-fw"></i> Address</a>
	</div>
	<div class="tabbed_content">
		<div class="tab pad tab-active" data-tab-id="general">
			<div class="row">
				<div class="col col6-24">
					<div class="col-inner">
						<label for="title">Title</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="title" id="title" placeholder="No Title Set" value="{{ $client->title }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="firtname">Firstname</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="firtname" id="firtname" placeholder="No Firtname Set" value="{{ $client->firstname }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="surname">Surname</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="surname" id="surname" placeholder="No Surname Set" value="{{ $client->surname }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="email">Email</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="email" id="email" placeholder="No Email Set" value="{{ $client->email }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="Landline">Landline</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="landline" id="landline" placeholder="No Landline Number Set" value="{{ $client->landline }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="mobile">Mobile</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="mobile" id="mobile" placeholder="No Mobile Phone Number Set" value="{{ $client->mobile }}">
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
						<input type="text" name="address_1" id="address_1" placeholder="No Address Line 1 Set" value="{{ $client->address_1 }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="address_2">Address Line 2</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="address_2" id="address_2" placeholder="No Address Line 2 Set" value="{{ $client->address_2 }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="address_3">Address Line 3</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="address_3" id="address_3" placeholder="No Address Line 3 Set" value="{{ $client->address_3 }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="town">Town</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="town" id="town" placeholder="No Town Set" value="{{ $client->town }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="city">City</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="city" id="city" placeholder="No City Set" value="{{ $client->city }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="county">County</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="county" id="county" placeholder="No County Set" value="{{ $client->county }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="postcode">Postcode</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="postcode" id="postcode" placeholder="No Postcode Set" value="{{ $client->postcode }}">
					</div>
				</div>
				<div class="col col6-24">
					<div class="col-inner">
						<label for="country">Country</label>
					</div>
				</div>
				<div class="col col18-24">
					<div class="col-inner">
						<input type="text" name="country" id="country" placeholder="No Country Set" value="{{ $client->country }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection