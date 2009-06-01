<?php
/*
 *  Description: A simple header with a navigation menu
 *  Date:        02/06/2009
 *  
 *  Author:      Paul Archer <ptarcher@gmail.com>
 *
 * Copyright (C) 2009 Paul Archer
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.

 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

echo '<!DOCTYPE HTML SYSTEM>';
echo '<html>';
echo '<head>';
if (!isset($page_title)) {
    $page_title = 'Weather Stats';
}
echo '<title>'.$page_title.'</title>';
echo '</head>';
echo '<body>';

echo '<center>';
echo '<table width="100%">';
echo '<tr>';

$page_list = array(
        'Wind Stats'        => 'wind.php', 
        'Temperature Stats' => 'temperature.php',
        'General Stats'     => 'general.php'
        );

foreach ($page_list as $name => $page) {
    echo '<td><center><a href="'.$page.'"><b>'.$name.'</b></a></center></td>';
}
    
echo '</tr>';

echo '<tr>';
echo '<td colspan='.count($page_list).'>';

?>
