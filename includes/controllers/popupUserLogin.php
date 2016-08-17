<?php

class popupUserLogin {
  private static function getEmail() {
    return Request::post("email");
  }
  private static function getPassword() {
    return Request::post("password");
  }
  private static function getUsername() {
    return Request::post("username");
  }
  public static function checkUser() {
    
    if (self::getEmail() && self::getPassword()) {

    if (!DB::query("SELECT * FROM users WHERE email=:email AND password=:password", array(":email"=>self::getEmail(),":password"=>self::getPassword()))) {
          // Email and Password combo is incorrect. Check if email is registered.
          if (!DB::query("SELECT * FROM users WHERE email=:email", array(":email"=>self::getEmail()))) {
            // Email isn't registered, need to register the user.
            if (self::getUsername()) {
              if (strlen(self::getUsername()) > 3 && strlen(self::getUsername()) < 20) {

                if (preg_match('/[^a-zA-Z0-9_]+/', self::getUsername())) {
                  // Inalid username
                  echo 'Username must only contain letters, numbers and underscores.';
                  die();
                } else {
                  if (!DB::query("SELECT username FROM users WHERE username=:username", array(':username' => self::getUsername()))) {
                  // Insert user into the users table
                  DB::query("INSERT INTO users VALUES ('','',:username,:password,:email,:login_date,'')", array(':username'=>self::getUsername(), ':email'=> self::getEmail(), ':password' => self::getPassword(), ':login_date' => date('Y-m-d')));

                  // Login the user
                  Login::loginUser(self::getUsername());

                  echo "User Registered";
                  die();
                } else {
                  echo "Username already taken.";
                  die();
                }
                }

              } else {
                echo 'Username must be between 3 and 20 characters in length';
                die();
              }
            } else {
              echo 'No User';
            }
            die();
          } else {
            // Email is registered, the password doesn't match.
            echo 'Incorrect Password';
            die();
          }
    } else {

    }

    }
  }
}

echo popupUserLogin::checkUser();
