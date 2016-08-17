<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Popup Login/Create Account</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-indigo.min.css" />
    <link rel="stylesheet" href="../static/css/core.css" />
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="popupcontainer" style="overflow: hidden">
    <h1><i class="material-icons" style="font-size: 30px;" id="accountcircle">account_circle</i></h1>
    <div class="slide1">
    <div class="notice noticeblue">Login to your account below. If you don't have one we'll create one for you when you try to login.</div>
    <form action="" style="width: 50%; margin: auto" id="loginform">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="email">
        <label class="mdl-textfield__label" for="sample3">Email Address</label>
        <span class="mdl-textfield__error" id="email_error">Email cannot be left blank!</span>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="password" id="password">
        <label class="mdl-textfield__label" for="sample3">Password</label>
        <span class="mdl-textfield__error" id="password_error">Password cannot be left blank!</span>
      </div>
      <button class="mdl-button mdl-js-button bottom-right-but">
        Login
      </button>
      <button class="mdl-button mdl-js-button bottom-left-but" id="forgotpass">
        Forgot Password
      </button>
    </form>
    </div>
    <div class="slide2" style="display: none; position: relative; left: 600px;">
      <div class="notice noticeblue">Almost done! Please choose a username.</div>
      <form action="" style="width: 50%; margin: auto" id="loginform">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="username" autocomplete="off">
        <label class="mdl-textfield__label" for="sample3">Choose Username</label>
        <span class="mdl-textfield__error" id="username_error">Username cannot be left blank!</span>
      </div>
      <button class="mdl-button mdl-js-button bottom-right-but" id="createbut">
        Create my Account
      </button>
    </form>
    </div>
    <div class="slide3" style="display: none; position: relative; right: 600px;">
      <div class="notice noticeblue">Enter your email below and we'll send you a link to change your password.</div>
      <form action="" style="width: 50%; margin: auto" id="loginform">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="forgotpassemail" autocomplete="off">
        <label class="mdl-textfield__label" for="sample3">Your Email Address</label>
        <span class="mdl-textfield__error" id="forgotpass_error">Email cannot be left blank!</span>
      </div>
      <button class="mdl-button mdl-js-button bottom-right-but" id="resetpassbut">
        Reset Password
      </button>
    </form>
    </div>
  </div>
  <script type="text/javascript">
  function checkemail(email) {
    var re = /.+@.+/i;
    return re.test(email)
  }
  $('#username').keypress(function() {
    if ($('#username').val().length < 3) {
      $('#username_error').css('visibility', 'visible');
      $('#username_error').html('Username cannot be less than 3 characters.');
    } else {
      $('#username_error').css('visibility', 'hidden');
    }
  });
  $('#email').keyup(function() {
    console.log($('#email').val())
    if (checkemail($('#email').val())) {
      $('#email_error').css('visibility', 'hidden');
      $('#email_error').html('Email cannot be left blank!');
    } else {
      $('#email_error').html('Email not valid.');
      $('#email_error').css('visibility', 'visible');
    }
  });
  $('#password').keypress(function() {
    if ($('#password').val().length < 6) {
      $('#password_error').css('visibility', 'visible');
      $('#password_error').html('Password cannot be less than 6 characters.');
    } else {
      $('#password_error').css('visibility', 'hidden');
    }
  });
    $('#forgotpass').click(function (e) {
      e.preventDefault();
      $('.slide1').css("position", "absolute");
      $('.slide1').css("height", "324px");
      $('.slide1').animate({"left": '600'});
      $('.slide3').css("display", "block");
      $('.slide3').css("position", "relvative");
      $('.slide3').css("height", "324px");
      $('.slide3').animate({"left": '0'});
    });
    $('#createbut').click(function(e) {
      e.preventDefault();
      if ($('#username').val() == "") {
        // No username chosen
        $('#username_error').css('visibility', 'visible');
      } else {
        $('#username_error').css('visibility', 'hidden');
        if ($('#username').val().length > 3) {
        $.post("", {email: $('#email').val(),password: $('#password').val(),username: $('#username').val()},
        function(data, status){
            if (data == "User Registered") {
              parent.showPopup();
            } else {
              $('#username_error').css('visibility', 'visible');
              $('#username_error').html(data);
            }
        });
        }
      }
    });
    $('#loginform').on('submit', function(e) { //use on if jQuery 1.7+
      e.preventDefault();  //prevent form from submitting

      if ($('#email').val() == "") {
        $('#email_error').css('visibility', 'visible')
      }
      if ($('#password').val() == "") {
        $('#password_error').css('visibility', 'visible')
      }

      if ($('#email').val() && $('#password').val() != "") {
      if ($('#username').val() == "") {
      $.post("", { email: $('#email').val(),password: $('#password').val()},
      function(data, status){
      if (data == "No User") {
        // User doesn't exist, we need to register them.
        $('.slide1').css("position", "absolute");
        $('.slide1').css("height", "324px");
        $('.slide1').animate({"left": '-600'});
        $('.slide2').css("display", "block");
        $('.slide2').css("position", "relvative");
        $('.slide2').css("height", "324px");
        $('.slide2').animate({"left": '0'});
      }
    });
      } else {
        alert("");
      }
    }
    });
  </script>
  </body>
</html>
