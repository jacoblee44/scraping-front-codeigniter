<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Smart Scraper</title>
		<!-- Datatable CSS -->
<link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Boxiocns CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<!-- jQuery Library -->

	<!-- Datatable JS -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
	<script src="<?php echo base_url(); ?>js/index.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->
	<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/toastr.min.js"></script>
	
    <script>
        var indeed_url = '<?php echo site_url('indeed'); ?>';
        var simply_url = '<?php echo site_url('simplyhired'); ?>';
        var careerjet_url = '<?php echo site_url('careerjet'); ?>';
        var jobisjob_url = '<?php echo site_url('jobisjob'); ?>';
        var usajobs_url = '<?php echo site_url('usajobs'); ?>';
        var jobsintrucks_url = '<?php echo site_url('jobsintrucks'); ?>';
        var alltruckjobs_url = '<?php echo site_url('alltruckjobs'); ?>';
		var coolworks_url = '<?php echo site_url('coolworks'); ?>';
		var westin_url = '<?php echo site_url(); ?>/ItemCRUD/westin';
		var westin_search_url = '<?php echo site_url('westinSearch'); ?>';
		var westin_start_url = '<?php echo site_url('westinStart'); ?>';
		var westin_stop_url = '<?php echo site_url('westinStop'); ?>';
		var format_url = '<?php echo site_url('format'); ?>';
		var base_url = '<?php echo site_url(); ?>';
		var login_url = '<?php echo site_url('Login'); ?>';
		var login_post_url = '<?php echo site_url('Login/process'); ?>';
		var register_url = '<?php echo site_url('Register'); ?>';
		var register_post_url = '<?php echo site_url('Register/process'); ?>';
		var scrape_url = '<?php echo site_url('scrape_sel_post'); ?>';
		var search = '<?php echo site_url('search'); ?>';
		var end = '<?php echo site_url('end'); ?>';
		var save_url = '<?php echo site_url('ItemCRUD/save_result'); ?>';
		var init_url = '<?php echo site_url('ItemCRUD/init'); ?>';
		var excel_url = '<?php echo site_url('ItemCRUD/excel_view'); ?>';
		var delete_url = '<?php echo site_url('ItemCRUD/delete_view'); ?>';
		var count_url = '<?php echo site_url('ItemCRUD/get_count'); ?>';
		var chat_url = '<?php echo site_url('ItemCRUD/chat_gpt'); ?>';
		var img_url = '<?php echo base_url(); ?>';
    </script>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>vendors/images/favicon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>vendors/images/favicon.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>vendors/images/favicon.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendors/styles/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/ChatBot.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo" style="width:200%; "><img src="https://i.pinimg.com/originals/48/71/55/487155a31a06632152af59e3fe99ba04.gif" alt="" style="border-radius: 50%"></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
        <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Google Map - Scraping</h2>
              </div>
          </div>
        </div>
			</div>
		</div>
    <div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="#">
				<img src="https://i.ytimg.com/vi/Wr5tXeUyxqk/maxresdefault.jpg" alt="" class="dark-logo" style="width: 24%; position: absolute; left: 20%; top: 20%; border-radius: 20%">
				<img src="https://i.pinimg.com/originals/57/fa/9d/57fa9d62d1a1b9fb4be02c2518738508.gif" alt="" class="light-logo" style="width: 24%; position: absolute; left: 20%; top: 20%; border-radius: 20%">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Map</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url('ItemCRUD/westin'); ?>">Google Map API</a></li>
							<li><a href="<?php echo site_url('ItemCRUD/search_result'); ?>">Search Scraping</a></li>
						</ul>
					</li>
          			<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">History</span>
              
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url('ItemCRUD/save'); ?>">History</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext">Jobs</span>
						</a>
						<ul class="submenu">
							<li><a href="#">Job</a></li>
							
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
  <div class="main-container" style="margin-left: 20px">
      