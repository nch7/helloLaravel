<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <!--<link rel="icon" href="img/favicon.ico">-->

    <title>INSPINIA - Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('res/home/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ URL::to('res/home/css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ URL::to('res/home/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('res/home/css/style.css') }}" rel="stylesheet">
    <script src="{{ URL::to('res/home/js/jquery-2.1.1.js') }}"></script>
	<script src="{{ URL::to('res/home/js/pace.min.js') }}"></script>
	<script src="{{ URL::to('res/home/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::to('res/home/js/classie.js') }}"></script>
	<script src="{{ URL::to('res/home/js/cbpAnimatedHeader.js') }}"></script>
	<script src="{{ URL::to('res/home/js/wow.min.js') }}"></script>
	<script src="{{ URL::to('res/home/js/inspinia.js') }}"></script>
</head>
<body id="page-top">
	@section('body')
	@show
</body>