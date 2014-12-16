<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title>Simpla Admin | Sign In</title>

		<!--                       CSS                       -->

		<!-- Reset Stylesheet -->
		{{ HTML::style('packages/dashboard/resources/css/reset.css') }}
		{{--<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />--}}

		<!-- Main Stylesheet -->
		{{ HTML::style('packages/dashboard/resources/css/style.css') }}
		{{--<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />--}}

		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		{{ HTML::style('packages/dashboard/resources/css/invalid.css') }}
		{{--<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />--}}

		<!-- Colour Schemes

		Default colour scheme is green. Uncomment prefered stylesheet to use it.

		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />

		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />

		-->

		<!-- Internet Explorer Fixes Stylesheet -->

		<!--[if lte IE 7]>
            {{ HTML::style('packages/dashboard/resources/css/ie.css') }}
			<!--<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />-->
		<![endif]-->

		<!--                       Javascripts                       -->

		<!-- jQuery -->
        {{ HTML::script('packages/dashboard/resources/scripts/jquery-1.3.2.min.js') }}
		{{--<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>--}}

		<!-- jQuery Configuration -->
        {{ HTML::script('packages/dashboard/resources/scripts/simpla.jquery.configuration.js') }}
		{{--<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>--}}

		<!-- Facebox jQuery Plugin -->
        {{ HTML::script('packages/dashboard/resources/scripts/facebox.js') }}
		{{--<script type="text/javascript" src="resources/scripts/facebox.js"></script>--}}

		<!-- jQuery WYSIWYG Plugin -->

		{{--<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>--}}

		<!-- Internet Explorer .png-fix -->

		<!--[if IE 6]>
            {{ HTML::script('packages/dashboard/resources/scripts/DD_belatedPNG_0.0.7a.js') }}
			<!--<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>-->
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->

	</head>

	<body id="login">

		<div id="login-wrapper" class="png_bg">
			<div id="login-top">

				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="{{ asset('packages/dashboard/resources/images/logo.png') }}" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->

			<div id="login-content">

                    {{ Form::open(['route'=>'dashboard.post.login']) }}

					<div class="notification information png_bg">
						<div>Enter your Email, Password and click "Sign In".</div>
					</div>
                    @include('dashboard._partials.notifications')
					<p>
					    {{ Form::label('email','Email') }}
						{{ Form::email('email',$value = "",['class'=>'text-input'])  }}
					</p>
					<div class="clear"></div>
					<p>
					    {{ Form::label('password', "Password") }}
					    {{ Form::password('password',['class'=>'text-input']) }}

					</p>
					<div class="clear"></div>
					<p id="remember-password">
					    {{ Form::label('remember','Remember') }}&nbsp;
					    {{ Form::checkbox('remember','',false) }}
					</p>
					<div class="clear"></div>
					<p>
					    {{ Form::submit('Sign In',['class'=>'button']) }}
					</p>
                {{ Form::close() }}
			</div> <!-- End #login-content -->
		</div> <!-- End #login-wrapper -->
  </body>
</html>
