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
 */

class View {
  /*
   * If the route is valid create the view and the view controller.
   * If the route is invalid do nothing and if something goes wrong
   * checking the route return 0;
  */
  public static function make($view) {

    if (Route::isRouteValid()) {
        // Create the view and the view controller.
        require_once( './includes/controllers/'.$view.'.php' );
        require_once( './includes/views/'.$view.'.php' );
        return 1;
    }

  }

}
