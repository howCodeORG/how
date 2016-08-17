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

    if (!in_array(explode('?',$uri)[0], $Routes)) {
      return 0;
    } else {
      return 1;
    }
  }

  // Insert the route into the $Routes array.
  private static function registerRoute($route) {

    global $Routes;
    $Routes[] = BASEDIR.$route;

  }

  // This method creates dynamic routes.
  public static function dyn($dyn_routes) {
    // Split the route on '/', i.e user/<1>
    $route_components = explode('/', $dyn_routes);
    // Split the URI on '/', i.e user/francis
    $uri_components = explode('/', substr($_SERVER['REQUEST_URI'], strlen(BASEDIR)-1));

    // Loop through $route_components, this allows infinite dynamic parameters in the future.
    for ($i = 0; $i < count($route_components); $i++) {
      // Ensure we don't go out of range by enclosing in an if statement.
      if ($i+1 <= count($uri_components)-1) {
        // Replace every occurrence of <n> with a parameter.
        $route_components[$i] = str_replace("<$i>", $uri_components[$i+1], $route_components[$i]);
      }
    }
    // Join the array back into a string.
    $route = implode($route_components, '/');
    // Return the route.
    return $route;
  }

  // Register the route and run the closure using __invoke().
  public static function set($route, $closure) {
      if ($_SERVER['REQUEST_URI'] == BASEDIR.$route) {
        self::registerRoute($route);
        $closure->__invoke();
      } else if (explode('?', $_SERVER['REQUEST_URI'])[0] == BASEDIR.$route) {
        self::registerRoute($route);
        $closure->__invoke();
      } else if ($_GET['url'] == explode('/', $route)[0]) {
        self::registerRoute(self::dyn($route));
        $closure->__invoke();
      }
  }
}
