@section('page_title', 'Job map')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('page_title')</title>

	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/site.min.css">

	<script type="text/javascript" async src="/assets/js/lib/modernizr-2.8.3.min.js"></script>
</head>
<body>
<header data-header-bg="{{ $header_image or '' }}">
	<div class="header-container rel">
		<div class="row cf">
			<div class="col col4-24">
				<div class="col-inner">
					<div class="header_logo">
						<a href="/">
							<img src="/assets/img/plannr.svg" alt="Plannr">
						</a>
					</div>
				</div>
			</div>
			<div class="col col16-24 col-search">
				<div class="col-inner">
					<div class="rel">
						<form action="/search" method="POST">
							{{ csrf_field() }}
							<input type="text" name="header_search_input" class="search header_search search-global" placeholder="Search Clients">
							<button class="btn-search">
								<i class="fa fa-search"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col col2-24">
				<div class="col-inner">
					<div class="tr">
						{{-- <a href="/auth/signin" class="btn">Sign In</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="job-map_sidebar">
	@foreach ($job as $j)
		<?php 
		$address_array = array($j->address_1, $j->address_2, $j->address_3, $j->town, $j->city, $j->postcode);
        $address_string = implode(', ', array_filter($address_array));
		?>
		<div class="job-map_sidebar_item">
			<div class="job-map_sidebar_item_main">
				<h2 class="mb0">{{ $j->clients->first()->firstname.' '.$j->clients->first()->surname }}</h2>
				<small>{{ $address_string }}</small>
			</div>
			<a href="/job/{{ $j->id }}" class="btn-txt">View Job</a>
		</div>
	@endforeach
</div>
<div class="job-map">
	<div id="map"></div>
</div>

<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0-rc.1/jquery-ui.min.js" integrity="sha256-mFypf4R+nyQVTrc8dBd0DKddGB5AedThU73sLmLWdc0=" crossorigin="anonymous"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANjWsTkK3fNrrdWI5CemHQEOpkChVVgUg&callback=initMap"></script>
<script src="/assets/js/combobox.js" type="text/javascript"></script>
<script src="/assets/js/plugins/rsearch.js" type="text/javascript"></script>
<script src="/assets/js/plugins/sweetalert.min.js" type="text/javascript"></script>
<script src="/assets/js/site.js" type="text/javascript"></script>


<script>
	function smoothZoom (map, max, cnt) {
	    if (cnt >= max) {
	            return;
        }
	    else {
	        z = google.maps.event.addListener(map, 'zoom_changed', function(event){
	            google.maps.event.removeListener(z);
	            smoothZoom(map, max, cnt + 1);
	        });
	        setTimeout(function(){map.setZoom(cnt)}, 80);
	    }
	}  

	function addMarker(map, title, content, lat, lng) {
		var infowindow = new google.maps.InfoWindow({
			content: content

		});

		var marker = new google.maps.Marker({
			position: new google.maps.LatLng({lat: lat, lng: lng}),
			map: map,
			title: title
		});

		google.maps.event.addListener( marker, 'click', function() {
			smoothZoom(map, 12, map.getZoom());
			infowindow.open(map, marker);
		});
	}

	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 5,
			center: {lat: 53.8008, lng: -1.5491}
		});

		@foreach ($job as $j)
		<?php
		$address_array = array_filter(array($j->address_1, $j->address_2, $j->address_3, $j->town, $j->city, $j->postcode));
		$content = '';
		$content .= '<div class="job-map_infobox">';
		$content .= '<strong>'.$j->clients->first()->firstname.' '.$j->clients->first()->surname.'</strong>';
		$content .= '<ul>';
		foreach ($address_array as $address) {
			$content .= '<li>'.$address.'</li>';
		}
		$content .= '</ul>';
		$content .= '<div class="tc">';
		$content .= '<a href="/job/'.$j->id.'" class="btn">View Job</a>';
		$content .= '</div>';
		$content .= '</div>';
		?>
		addMarker(map, '{{ $j->clients->first()->firstname }} {{ $j->clients->first()->surname }}', '{!! $content !!}', {{ $j->lat }}, {{ $j->lng }});
		@endforeach
	}
</script>

</body>
</html>