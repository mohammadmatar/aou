<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> 
    <!-- Custom styles for this template -->
    
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap css -->
     <link type="text/css" rel='stylesheet' href="/js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">
    <!-- End Bootstrap css -->

    <!-- Animate css -->
{{--     <link type="text/css" rel='stylesheet' href="/css/animate.css"> --}}
    <!-- End Animate css -->
    
    <!-- Bootstrap css -->
    {{-- <link type="text/css" rel='stylesheet' href="/css/bootstrap.min.css"> --}}
    <link type="text/css" rel='stylesheet' href="/js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">
    <!-- End Bootstrap css -->
    
    <!-- Jquery UI css -->
    {{-- <link type="text/css" rel='stylesheet' href="/js/jqueryui/jquery-ui.css">
    <link type="text/css" rel='stylesheet' href="/js/jqueryui/jquery-ui.structure.css"> --}}
    <!-- End Jquery UI css -->
    
    <!-- Fancybox -->
{{--     <link type="text/css" rel='stylesheet' href="/js/fancybox/jquery.fancybox.css"> --}}
    <!-- End Fancybox -->
    
    <link type="text/css" rel='stylesheet' href="/fonts/fonts.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    
     <link type="text/css" data-themecolor="default" rel='stylesheet' href="/css/main-green.css">
    
    <link type="text/css" rel='stylesheet' href="/js/rs-plugin/css/settings.css">
    <link type="text/css" rel='stylesheet' href="/js/rs-plugin/css/settings-custom.css">
    <link type="text/css" rel='stylesheet' href="/js/rs-plugin/videojs/video-js.css">

</head>

<body>
    @include('layouts.adminNavbar')
    @include('layouts.adminSidebar')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    {{-- @include('layouts.session') --}} @yield('content')

    </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')

    </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    @include('layouts.adminIcons')


</body>

</html>