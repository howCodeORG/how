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
 * The first thing we do is autoload all of our classes. We're using the older
 * __autoload function as opposed to spl_autoload_register because all of our
 * classes are located in the /includes/classes/ directory.
 *
*/
require_once( './includes/_Globals.php' );
/*
 * By including routes/Routes.php we get access to the $Routes
 * array containing all of the valid routes for our app.
*/
require_once( './includes/routes/Routes.php' );

function __autoload($class_name) {
      require_once './includes/classes/'.$class_name.'.php';
}

// We create a new instance of the 'How' object and execute the run method.
$how = new How();
$how->run();
