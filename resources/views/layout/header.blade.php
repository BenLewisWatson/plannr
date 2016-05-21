<header data-header-bg="{{ $header_image or '' }}">
	<div class="header-container rel">
		<div class="row cf">
			<div class="col col4-24">
				<div class="col-inner">
					<div class="header_logo">
						<img src="/assets/img/plannr.svg" alt="Plannr">
					</div>
				</div>
			</div>
			<div class="col col16-24 col-search">
				<div class="col-inner">
					<div class="rel">
						<input type="text" class="search header_search search-global" placeholder="Search Jobs">
						<div class="btn-search">
							<i class="fa fa-search"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col col2-24">
				<div class="col-inner">
					<div class="tr">
						<a href="/auth/signin" class="btn">Sign In</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="header_stopper">
	<div class="wrapper">
		<div class="page-title">
		    <h1 class="page-title_heading">
		       @yield('page_title', '')
		    </h1>
		</div>
	</div>
</div>