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
 * These includes aren't needed because of our __autoload function
 * in the index page. Their being kept as comments because they
 * will be useful for debugging.
 *
 * include_once( './includes/classes/Route.php' );
 * include_once( './includes/classes/View.php' );
 *
 * Probably shouldn't be calling the View directly from the route, should
 * be calling the controller and then allow the controller to call the route.
 * Will probably change this in the future.
*/

// This is the index page. The first route.
Route::set('', function() {
  View::make('Root');
});
// This is a test route, leading to an about-us page.
Route::set('about-us', function() {
  View::make('AboutUs');
});
// This is a route for the User Login / Registration popup.
Route::set('popups/user-login', function() {
  View::make('popupUserLogin');
});
/*
 * This is an example of a dynamic route. In this example,
 * this route would display a users profile page.
*/
Route::set('user/<1>', function() {
  View::make('UserProfile');
});
