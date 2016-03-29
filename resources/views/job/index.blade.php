@extends('index')
@section('page_title', 'Upcoming Jobs')
@section('content')
<div class="box-container">
	@foreach ($job as $j)
	    <div class="box box-job">
	        Job: {{ $j->id }}
	    </div>
	@endforeach
</div>
<div class="mt mb">
	{!! $job->render() !!}
</div>
@endsection