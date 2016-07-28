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

class Route {

  /*
   * Checks if the current route is valid. Checks the route
   * against the global $Routes array.
  */
  public function isRouteValid() {
    global $Routes;
    $uri = $_SERVER['REQUEST_URI'];

    if (!in_array($uri, $Routes)) {
      return 0;
    } else {
      return 1;
    }
  }

  // Insert the route into the $Routes array.
  private function registerRoute($route) {

    global $Routes;
    $Routes[] = BASEDIR.$route;

  }

  // Register the route and run the closure using __invoke().
  public static function set($route, $closure) {

    self::registerRoute($route);
    $closure->__invoke();

  }
}
