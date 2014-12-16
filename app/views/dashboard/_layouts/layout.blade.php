<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Simpla Admin</title>
		<!--                       CSS                       -->
		<!-- Reset Stylesheet -->
		{{ HTML::style("packages/dashboard/resources/css/reset.css") }}
		{{--<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />--}}

		<!-- Main Stylesheet -->
		{{ HTML::style("packages/dashboard/resources/css/style.css") }}
		{{--<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />--}}

		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
        {{ HTML::style("packages/dashboard/resources/css/invalid.css") }}
		{{--<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />--}}

		<!-- Colour Schemes
            Default colour scheme is green. Uncomment prefered stylesheet to use it.

            <link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />

            <link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />
		-->

		<!-- Internet Explorer Fixes Stylesheet -->

		<!--[if lte IE 7]>
            {{ HTML::style("packages/dashboard/resources/css/ie.css") }}
		<![endif]-->
        {{-- <link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" /> --}}

		<!--                       Javascripts                       -->

		<!-- jQuery -->
        {{ HTML::script("packages/dashboard/resources/scripts/jquery-1.3.2.min.js") }}
		{{--{{ HTML::script("packages/dashboard/resources/scripts/jquery-1.11.1.js") }}--}}
		{{--<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>--}}

		<!-- jQuery Configuration -->
		{{ HTML::script("packages/dashboard/resources/scripts/simpla.jquery.configuration.js") }}
		{{--<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>--}}

		<!-- Facebox jQuery Plugin -->
		{{ HTML::script("packages/dashboard/resources/scripts/facebox.js") }}
		{{--<script type="text/javascript" src="resources/scripts/facebox.js"></script>--}}

		<!-- jQuery WYSIWYG Plugin -->
		{{ HTML::script("packages/dashboard/resources/scripts/jquery.wysiwyg.js") }}
		{{--<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>--}}

		<!-- Internet Explorer .png-fix -->

		<!--[if IE 6]>
    		{{ HTML::script("packages/dashboard/resources/scripts/DD_belatedPNG_0.0.7a.js") }}
			<!--<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>-->
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
	</head>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
        @include('dashboard._partials.sidebar')

		<div id="main-content"> <!-- Main Content Section with everything -->
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
            @section('page-head')
                <!-- Page Head -->
                <h2>Welcome {{ Sentry::getUser() ? Sentry::getUser()->email: 'John' }}</h2>
                <p id="page-intro">What would you like to do?</p>

                <ul class="shortcut-buttons-set">
                    <li><a class="shortcut-button new-article" href="{{ route('dashboard.categories.create') }}"><span class="png_bg">
                        Create a new Category
                    </span></a></li>
                    <li><a class="shortcut-button new-article" href="{{ route('dashboard.users.create') }}"><span class="png_bg">
                        Create a new User
                    </span></a></li>
                {{--
                    <li><a class="shortcut-button new-page" href="#"><span class="png_bg">
                        Create a New Page
                    </span></a></li>

                    <li><a class="shortcut-button upload-image" href="#"><span class="png_bg">
                        Upload an Image
                    </span></a></li>

                    <li><a class="shortcut-button add-event" href="#"><span class="png_bg">
                        Add an Event
                    </span></a></li>

                    <li><a class="shortcut-button manage-comments" href="#messages" rel="modal"><span class="png_bg">
                        Open Modal
                    </span></a></li>--}}

                </ul><!-- End .shortcut-buttons-set -->
            @show
			<div class="clear"></div> <!-- End .clear -->
			@include('dashboard._partials.notifications')
			<div class="clear"></div> <!-- End .clear -->
			@yield('content')

{{--			<div class="content-box column-left"><!-- Start Content Box -->

				<div class="content-box-header">

					<h3>Content box left</h3>

				</div> <!-- End .content-box-header -->

				<div class="content-box-content">

					<div class="tab-content default-tab">

						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>

					</div> <!-- End #tab3 -->

				</div> <!-- End .content-box-content -->

			</div> <!-- End .content-box -->

			<div class="content-box column-right"><!-- Start Content Box -->

				<div class="content-box-header">

					<h3>Content box right</h3>

				</div> <!-- End .content-box-header -->

				<div class="content-box-content">

					<div class="tab-content default-tab">

						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>

					</div> <!-- End #tab3 -->

				</div> <!-- End .content-box-content -->

			</div> <!-- End .content-box -->
			<div class="clear"></div>


			<!-- Start Notifications -->

			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>

			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>

			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>

			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>

			<!-- End Notifications -->--}}

			<div id="footer">
				<small>
						&#169; Copyright 2009 Simpla Admin | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->

		</div> <!-- End #main-content -->

	</div></body>

</html>