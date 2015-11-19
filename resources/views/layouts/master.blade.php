<!DOCTYPE html>
<html ng-app="app" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de colas</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/personalizado.css') }}" rel="stylesheet" type="text/css">
 	  <script src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
</head>

<body ng-controller="@yield('controlador')">
<div ng-include="'nav'"></div>
<div class = "container">

<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">@yield('title')</h3>
   </div>
   <div class = "panel-body">
   
   
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> 	
 @yield('content')
</div>
	

</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>