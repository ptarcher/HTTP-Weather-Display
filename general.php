<?php
/*
 *  Description: 
 *  Date:        
 *  
 *  Author:      Paul Archer <ptarcher@gmail.com>
 *
 * Copyright (C) <year>  <name of author>
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

include('include/session.php');
include('header.php');

$sql = 'SELECT 
            `date`,
            `time`,
            temperature,
            current_windchill,
            max_daily_temperature,
            min_daily_temperature,
            dew_point_temperature,
            barometer,
            daily_rainfall,
            outdoor_humidity
        FROM 
            wx_data
        ORDER BY
            `date` DESC,
            `time` DESC
        LIMIT 
            10';
$row = $dbh->query($sql)->fetch(PDO::FETCH_ASSOC);

echo '<center>';
echo '<table>';
foreach($row as $name => $value) {
    echo '<tr><td>'.$name.'</td><td>'.$value.'<td></tr>';
}
echo '</table>';
echo '</center>';

include('footer.php');
?>
