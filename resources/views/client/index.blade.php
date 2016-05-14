@extends('index')
@section('page_title', 'Add New Client')

@section('content')
<div class="box-clients">
@foreach ($client as $c)
	<div class="client">
		<div class="client_name">
			<h2><a href="/client/{{ $c->id }}">{{ $c->firstname }} {{ $c->surname }}</a></h2>
		</div>
		<a href="/client/{{ $c->id }}" class="client_btn-view"><i class="fa fa-eye"></i></a>
	</div>
@endforeach
</div>
@endsection