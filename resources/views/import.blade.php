@extends('index')
@section('page_title', 'Import from Excel')

@section('content')
	@if (count($errors) > 0)
<div class="error pad mb">
	<h2>There were errors with the details you submitted.</h2>
    <ul class="m0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/import" id="impirt-records-form" method="POST">
	{{ csrf_field() }}
	<div class="well-light pad mb">
		<div class="form-group">
			<h1 class="form-group_title">Add Job Clients</h1>
			<div class="form-group_controls">
				<div class="row mt">
					<div class="col col24-24">
						<div class="col-inner">
							<label for="import">Import</label>
							<input type="file" name="import" id="import" class="dropzone" placeholder="Import" value="{{ old('import') }}">
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
<script src="/assets/js/plugins/dropzone.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('input#import').dropzone({
			url: '/import'
		});
	})
</script>
<script>
	
</script>
@endsection