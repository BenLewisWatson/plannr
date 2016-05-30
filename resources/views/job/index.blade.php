@extends('index')
@section('page_title', 'Upcoming Jobs')

@section('sidebar')
	
@endsection

@section('sidebar_right')
	<div class="rel">
		<a href="/job/create" class="btn-add-client">
			<div class="box m0 mb">
					<i class="fa fa-plus"></i> <span>Create Job</span>
			</div>
		</a>
	</div>
	<div class="rel">
		<a href="/client/create" class="btn-add-client">
			<div class="box m0 mb">
					<i class="fa fa-plus"></i> <span>Create Client</span>
			</div>
		</a>
	</div>
	<div class="rel">
		<a href="/role/create" class="btn-add-client">
			<div class="box m0">
					<i class="fa fa-plus"></i> <span>Create Role</span>
			</div>
		</a>
	</div>
@endsection

@section('content')
<div class="row" data-animation="hierarchical-display">
@foreach ($job as $j)
	<div class="col col12-24">
		<div class="col-inner">
		    <div class="box box-hero box-job">
		        <div class="box_thumbnail">
		        <?php // $j->getImage(); ?>
	        	<div class="box_thumbnail_text">
	        		{{ $j->clients->first()->firstname.' '.$j->clients->first()->surname }}
	        	</div>
		        </div>
	        	<div class="box_header cf">
		        	<div class="fl">
		        		<div class="box_title">
				        	{{ $j->clients->first()->firstname.' '.$j->clients->first()->surname }}
				        </div>
				        <div class="box-job_date">
				        	<i class="fa fa-calendar-o"></i> 26th May 2016
				        </div>
		        	</div>
		        	{{-- <div class="fr">
		        		<div class="box-job_loc">
		        			<i class="fa fa-map-marker"></i> 12 Mi
		        		</div>
		        	</div> --}}
	        	</div>
		        <div class="box_main">
		        	<div class="box_content">
		        		Lorem ipsum dolor sit amet, consectetur adipisicing elit.
		        	</div>
		        </div>
		        <div class="box_footer">
		        	<a href="/job/{{ $j->id }}" class="btn btn-txt">More Info</a>
		        	{{-- <a href="" class="btn btn-txt">Navigate</a> --}}
		        </div>
		    </div>
		</div>
	</div>
@endforeach
</div>
@endsection

@section('scripts')
<script src="/assets/js/lib/hierarchical-display/jquery.zmd.hierarchical-display.min.js" type="text/javascript"></script>
@endsection