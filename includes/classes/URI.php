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

class URI {

  public static function get($param) {

    if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
      return explode('&', explode($param.'=', $_SERVER['REQUEST_URI'])[1])[0];
    } else {
      return false;
    }

  }

}
