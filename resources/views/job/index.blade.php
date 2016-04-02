@extends('index')
@section('page_title', 'Upcoming Jobs')

@section('sidebar')
	
@endsection

@section('sidebar_right')
	<div class="rel">
		<div class="box m0">
			<a href="/" class="btn-add-client">
				<i class="fa fa-plus"></i> <span>Add Client</span>
			</a>
		</div>
	</div>
@endsection

@section('content')
<div class="row" data-animation="hierarchical-display">
@foreach ($job as $j)
	<div class="col col12-24">
		<div class="col-inner">
		    <div class="box box-hero box-job">
		        <div class="box_thumbnail">
	        	<img src="https://photos-0.carwow.co.uk/models/430x294/A3-SB-18_0.jpg" alt="Temp">
	        	<div class="box_thumbnail_text">
	        		Job {{ $j->id }}
	        	</div>
		        </div>
	        	<div class="box_header cf">
		        	<div class="fl">
		        		<div class="box_title">
				        	Job: {{ $j->id }}
				        </div>
				        <div class="box-job_date">
				        	<i class="fa fa-calendar-o"></i> 21st Jan 2016
				        </div>
		        	</div>
		        	<div class="fr">
		        		<div class="box-job_loc">
		        			<i class="fa fa-map-marker"></i> 12 Mi
		        		</div>
		        	</div>
	        	</div>
		        <div class="box_main">
		        	<div class="box_content">
		        		Lorem ipsum dolor sit amet, consectetur adipisicing elit.
		        	</div>
		        </div>
		        <div class="box_footer">
		        	<a href="" class="btn btn-txt">More Info</a>
		        	<a href="" class="btn btn-txt">Navigate</a>
		        </div>
		    </div>
		</div>
	</div>
@endforeach
</div>
<div class="mt mb">
	{!! $job->render() !!}
</div>
@endsection

@section('scripts')
<script src="/assets/js/lib/hierarchical-display/jquery.zmd.hierarchical-display.min.js" type="text/javascript"></script>
@endsection