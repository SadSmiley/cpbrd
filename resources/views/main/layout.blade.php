<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>CPBRD - {{ $page or 'Welcome' }}</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="apple-touch-icon.png">
      <!--BOOTSTRAP CSS-->
      <link rel="stylesheet" href="/assets/initializr/css/bootstrap.min.css">
      <link rel="stylesheet" href="/assets/initializr/css/bootstrap-theme.min.css">
      <!--FONT CSS-->
      <link rel="stylesheet" href="/assets/font/twcentmt.css" type="text/css" />
      <!--CHECKBOX-->
      <link rel="stylesheet" href="/assets/checkbox/style.css" type="text/css" />
      <!--GLOBAL CSS-->
      <link rel="stylesheet" href="/assets/main/css/global.css" type="text/css" />
      <!--OTHER CSS-->
      @yield("css")
      <!--RESPOND JS-->
      <script src="/assets/initializr/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
   </head>
   <body>
      <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      @if(Request::segment(1))
      <!--<header class="old">-->
      <!--   <div class="width-container">-->
      <!--      <table class="header-holder">-->
      <!--         <tbody>-->
      <!--            <tr>-->
      <!--               <td class="logo"><img src="/assets/main/img/logo.png"></td>-->
      <!--               <td class="text">-->
      <!--                  <div class="title">CONGRESSIONAL POLICY </br>AND BUDGET RESEARCH DEPARTMENT</div>-->
      <!--                  <div class="sub">BILLS TRACKING AND MONITORING</div>-->
      <!--               </td>-->
      <!--            </tr>-->
      <!--         </tbody>-->
      <!--      </table>-->
      <!--      </div>-->
      <!--</header>-->
      <header class="new">
         <div class="clearfix width-container">
            <div class="pull-left">
               <div class="img"><a href="/"><img src="/assets/main/img/trans-logo.png"></a></div>
               <div class="text">
                  <div class="title">CPBRD</div>
                  <div class="sub">CONGRESSIONAL POLICY AND BUDGET RESEARCH DEPARTMENT</div>
               </div>
            </div>
            <div class="pull-right">
               <div class="side-title" style="padding-top: 7px; padding-bottom: 0;">
                  <div>BILLS TRACKING SYSTEM</div>
                  <div style="font-weight: 400; letter-spacing: 0;">
                     <div style="font-size: 18.37px; display: inline-block;"><a style="color: #fff;" href="/">HOME</a></div>
                     <div style="font-size: 18.37px; display: inline-block; margin: 0 7.5px;"><a style="color: #fff;" href="/">CPBRD MAINSITE</a></div>
                     <div style="font-size: 18.37px; display: inline-block; border: 1px solid #fff; padding: 0 7.5px;"><a href="/login" style="color: #fff;">LOGIN</a></div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      @endif
      
      <div class="width-container">
         @yield("content")
      </div>
      
      <!--JQUERY JS-->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="/assets/initializr/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
      <!--BOOTSTRAP JS-->
      <script src="/assets/initializr/js/vendor/bootstrap.min.js"></script>
      <!--CHECKBOX JS-->
      <script type="text/javascript" src="/assets/checkbox/jspatch.js"></script>
      <!--GLOBAL JS-->
      <script type="text/javascript" src="/assets/main/js/global.js"></script>
      <!--OTHER JS-->
      @yield("script")
   </body>
</html>
