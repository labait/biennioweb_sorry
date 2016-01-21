<?php

  $sorry = new Sorry();
  $action = FALSE;
  $excuse = array('index' => 0);
  if (isset($_GET['index'])){
    $excuse = $sorry->set($_GET['index']);
    header('Location: '.'?code='.$excuse['code']);
  } else if(isset($_GET['code'])){
    $excuse = $sorry->get(NULL, $_GET['code']);
  }


  class Sorry {
      //public $aMemberVar = 'aMemberVar Member Variable';
      //public $aFuncName = 'aMemberFunc';

      private $db;


      function openDb(){
        $this->db = new SQLite3('../database/database.sqlite') or die('Unable to open database');
      }

      function get($id=NULL, $code=NULL){
        $sql = "select * from excuses where ".($id ? " id = $id" : "code='$code'");
        $this->openDb();
        $excuse = $this->db->querySingle($sql, TRUE);
        return $excuse;
      }

      function set($index, $message=NULL){
        $this->openDb();
        $code = uniqid();
        date_default_timezone_set('Europe/Rome');
        $date = new DateTime();

        $timestamp = $date->getTimestamp();
        $query = "
          insert into excuses (code, 'index', message, timestamp) values ('$code', $index, '$message', $timestamp);
        ";

        $this->openDb();
        $this->db->query($query);
        $excuse = $this->get($this->db->lastInsertRowID());
        return $excuse;
      }

  }

?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <link rel="stylesheet" href="css/main.css">

        <link rel="stylesheet" href="css/style.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="app" class="container">

          <!-- loading -->
          <section id="loading">
            <div class="row">
              <div class="col-sm-12">
                loading...
              </div>
            </div>
          </section>


          <!-- home -->
          <section id="home">
            <div class="row">
              <div class="col-sm-12">
                  <div id="logo"></div>
                  <div class="description">
                    Welcome to sorry
                  </div>
                  <a href="#" class="link-generate">Generate!</a>
              </div>
            </div>
          </section>


          <!-- result -->
          <section id="result">
            <div class="row">
              <div class="col-sm-12">

                <ul id="excuses">
                  <li class="excuse" id="excuse1">
                    <img src="http://45.media.tumblr.com/35a72b8d7bb75e6c868142c04dc34cff/tumblr_n3nc38XJS01t3b836o1_500.gif" />
                  </li>
                  <li class="excuse" id="excuse2">
                    <img src="http://49.media.tumblr.com/8fffcde1ed56b3530bc6d39b6c406ad3/tumblr_nwoit57Z271rknn8qo3_500.gif" />
                  </li>
                  <li class="excuse" id="excuse3">
                    <img src="https://media.giphy.com/media/RFDXes97gboYg/giphy.gif" />
                  </li>
                </ul>
              </div>

              <div id="buttons-share" class="row">
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_email"></a>
                </div>
                <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
              </div>

            </div>
          </section>


          <!-- info -->
          <section id="info">
            <div class="row">
              <div class="col-sm-12">
                  This is the info section

              </div>
            </div>
          </section>

          <footer>
            <a href="./" class="link-home">Home</a>
            <a href="#" class="link-info">Info</a>
            <a href="#" class="link-generate">Generate!</a>

          </footer>


        </div>



        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/purl.js"></script>
        <script src="js/plugins.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <script src="js/shake.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>


        <!-- SCRIPT INIT -->
        <script>
          $(document).ready(function(){
            init()
            var url = $.url();
            if(url.param('code')){
              //alert(url.param('code'))
              renderExcuse(<?php print $excuse['index']; ?>)
            } else {
              showSection("home")
            }

          })

        </script>

    </body>
</html>
