<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 2.3
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->


<!-- Mirrored from demo.geekslabs.com/materialize/v2.3/layout02/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2015 11:07:13 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>SIM-OBL - Telkom Indonesia</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{ asset('adm01/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('adm01/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('adm01/css/custom-style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- CSS for full screen (Layout-2)-->    
  <link href="{{ asset('adm01/css/style-fullscreen.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('adm01/css/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{ asset('adm01/css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('adm01/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->


  {!! Form::open(['route' => 'login']) !!}

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
          @if(Session::has('error'))
            <div class="alert alert-danger">
              <ul>
                    <li>{!!Session::get('error')!!}</li>
              </ul>
            </div>
          @endif
            <img src="{{ asset('adm01/images/tlkom.png') }}" alt="" class="square responsive-img valign profile-image-login">
            <p class="center login-form-text">Login</p>
            <p class="center login-form-text">SIM-OBL</p>
            <p class="center login-form-text">Telkom Indonesia</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <label for="name" class="center-align">Username</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        
                
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ asset('adm01/js/jquery-1.11.2.min.js') }}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{ asset('adm01/js/materialize.js') }}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{ asset('adm01/js/prism.js') }}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{ asset('adm01/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="{{ asset('adm01/js/plugins.js') }}"></script>
"></script>

</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v2.3/layout02/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2015 11:07:16 GMT -->
</html>