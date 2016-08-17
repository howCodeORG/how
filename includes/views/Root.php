<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>howCode</title>
    <meta charset="UTF-8">
    <meta name="Keywords" content="learn, to, code, free, tutorials, videos">
    <meta name="Description" content="Learn to code using our free tutorials and videos!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-indigo.min.css" />
    <link rel="stylesheet" href="static/css/core.css" />
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="popupbg"></div>
    <div class="wrap">
      <div style="background-color: #fff8bd;text-align: center;padding: 5px 0px;border: 1px solid #FFEB3B;border-top: 0px;">The features on this page DO NOT WORK. The new howCode is under construction. You can see the progress on github.com/howcodeorg</div>
      <header>
        <div class="logo">
          <img src="./static/images/logo.jpg" width="100" alt="howCode" />
        </div>
        <div class="leftmenu menu">
        <ul>
          <?php
          if (!Login::isLoggedIn()) {
          echo '<li><a href="javascript:void(0)" id="loginsignup" style="padding: 26px;">Login or Sign Up</a></li>';
        } else {
          echo '<li><a href="javascript:void(0)" id="loginsignup" style="padding: 26px;">My Account</a></li>';
        }
          ?>
        </ul>
        </div>
        <div class="rightmenu menu">
        <ul>
          <li><a href="#" style="padding: 26px;">View our Library</a></li>
          <li><i class="material-icons"><a href="javascript:void(0)" class='searchbut'>search</a></i></li>
        </ul>
        </div>
        <div class="searchBox">
          <input type="text" name="searchquery" value="" placeholder="Search our Library ...">
        </div>
        <div class="popup" id="loginpopup">
          <iframe src="" height="0" id="iframelogin"></iframe>
          <div class="loadingspinner"><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div></div>
        </div>
      </header>
    </div>
    <script type="text/javascript">
    /*
    Javascript code for toggling the popup box and the
    popup background.
    */
    var showPopup = function() {
      $('.popupbg').fadeToggle(200);
      $('#loginpopup').toggle();
      $('iframe').css('height', '0');
      $('.loadingspinner').css('display', 'block');
      $('#iframelogin').attr('src', 'popups/user-login');
    };
    $('#loginsignup').click(showPopup);
    $('.popupbg').click(showPopup);
      $('document').ready(function() {
        /*
        When the frame loads hide the loading spinner,
        set the frame height to 400 and set the overflow
        to none.
        */
        $('iframe').on('load', function() {
          $('iframe').css('height', '400');
          $('iframe').css('overflow', 'none');
          $('.loadingspinner').css('display', 'none');
        });


        /*
        Display and hide the search box, when the user clcks the magnifying
        glass the search box is displayed. The magnifying glass then becomes a
        close button to hide the search box.
        */
        $('.searchbut').click(function() {
          $('.searchBox').toggle();
          if ($('.searchBox').css('display') == 'none') {
            $('.searchbut').html("search");
          } else {
            $('.searchbut').html("close");
          }
        });

      });
    </script>
  </body>
</html>
