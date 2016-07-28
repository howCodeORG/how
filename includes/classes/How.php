<?php

/*
 * How - The program that powers howCode.org
 * Copyright (C) 2016
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * https://howcode.org
 *
 * By including routes/Routes.php we get access to the $Routes
 * array containing all of the valid routes for our app.
*/
include_once( './includes/routes/Routes.php' );

class How {

  /*
   * getRoute() is the method that actually checks if the current
   * route is valid or not.
  */
  public function getRoute() {

    global $Routes;
    $uri = $_SERVER['REQUEST_URI'];

    // Check if the route is in $Routes
    if (!in_array($uri, $Routes)) {
      die( 'Invalid route.' );
    }

    return $uri;

  }

  /*
   * The run() method is the first method that runs.
   * run() gets the current route and checks if it is valid.
   * If the route is invalid the app doesn't proceed any further.
  */
  public function run() {

      try {

        $this->getRoute();

      } catch (Exception $e) {

        die( 'Failed to get route.' );

      }
  }

}
