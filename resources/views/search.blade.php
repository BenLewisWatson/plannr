@extends('index')

@section('content')
<div class="row" data-animation="search-results">
@foreach ($result as $r)
<div class="search-result">
	{{ $r->firstname }} {{ $r->surname }}
</div>
@endforeach
</div>
@endsection

@section('scripts')
<script src="/assets/js/lib/hierarchical-display/jquery.zmd.hierarchical-display.min.js" type="text/javascript"></script>
@endsection