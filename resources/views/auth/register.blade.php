<!DOCTYPE html>
<html lang="en">

<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 2.3
  Author: GeeksLabs
  Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->


<!-- Mirrored from demo.geekslabs.com/materialize/v2.3/layout02/user-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2015 11:07:16 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Register Page | SIM-OBL - Telkom Indonesia</title>

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


{!! Form::open(array('route'=>'post-registration')) !!}
    {!! csrf_field() !!}

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Daftar</h4>
            <p class="center">SIM-OBL</p>
             <p class="center">Telkom Indonesia</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <label for="name" class="center-align">nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="center-align">
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <label for="email" class="center-align">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="center-align">
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <label for="password">Password</label>
            <input type="password" name="password">
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
           
            <label for="password_confirmation">Password again</label>
             <input type="password" name="password_confirmation">
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s6">
              {!! Form::select('role',array(''=>'Pilih Level','Admin'=>'Admin','Staff'=>'Staff','Client'=>'Client'),'') !!}
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Register</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="page-login.html">Login</a></p>
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

</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v2.3/layout02/user-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2015 11:07:17 GMT -->
</html>