@extends('index')
@section('page_title', 'Add New Client')

@section('content')
<style>
	li.selected {background:yellow}
</style>
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
<form action="/role/create" id="create-role-form" method="POST">
	{{ csrf_field() }}
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Add Job Role</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col24-24">
						<div class="col-inner">
							<label for="title">Role Title</label>
							<input type="text" name="title" id="title" placeholder="Search for a role" value="{{ old('title') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mb">
		<button class="btn btn-txt" acition="submit">Add Role</button>
	</div>
</form>
@endsection

@section('scripts')
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/rsearch.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('input#title').searchable({ search: {url: '/api/search/client/'} });
	$('input.header_search.search-global').searchable({ search: { url: '/api/search/client/'} });

	$('#create-role-form').validate({
		rules: {	
			title: {
				required: true
			}
		}
	});
});
</script>
@endsection