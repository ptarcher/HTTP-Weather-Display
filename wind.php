<?php
/*
 *  Description: Display wind charts and stats
 *  Date:        02/06/2009
 *  
 *  Author:      Paul Archer <ptarcher@gmail.com>
 *
 * Copyright (C) 2009  Paul Archer
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
            date,
            time,
            average_windspeed,
            wind_direction,
            gust_windspeed
        FROM 
            wx_data
        ORDER BY
            date DESC,
            time DESC
        LIMIT 
            60';
$sql_result = array();
$sql_result = $dbh->query($sql);

$first = true;

$chart_url = 'http://chart.apis.google.com/chart';
$chart_type = 'cht=lc';
$chart_size = 'chs=300x250';
$chart_data = 'chd=t:';


foreach($sql_result as $row) {
    if (!$first) {
        $chart_data_average   .= ',';
        $chart_data_direction .= ',';
        $chart_data_gust      .= ',';
    } else {
        $first = false;

        $chart_data_average   = $chart_data;
        $chart_data_direction = "chxl=0:|North|East|South|West|&" . $chart_data;
        $chart_data_gust      = $chart_data;
    }
    $chart_data_average   .= $row['average_windspeed'] * 10;
    $chart_data_direction .= ($row['wind_direction'] / 360 * 100);
    $chart_data_gust      .= $row['gust_windspeed'] * 10;
}

$chart_average   = $chart_url.'?'.$chart_type.'&'.$chart_size.'&'.$chart_data_average;
$chart_direction = $chart_url.'?'.$chart_type.'&'.$chart_size.'&'.$chart_data_direction;
$chart_gust      = $chart_url.'?'.$chart_type.'&'.$chart_size.'&'.$chart_data_gust;

echo '<center>';
echo '<table>';
echo '<tr>';

echo '<td>';
echo '<h2>Average Wind Speed</h2>';
echo "<img src='$chart_average'>";;
echo '</td>';

echo '<td>';
echo '<h2>Wind Direction</h2>';
echo "<img src='$chart_direction'>";;
echo '</td>';

echo '<td>';
echo '<h2>Wind Gust Speed</h2>';
echo "<img src='$chart_gust'>";;
echo '</td>';

echo '</tr>';
echo '</table>';
echo '</center>';

/* This is BAD - Should be no need to do the query twice */
$sql_result = array();
$sql_result = $dbh->query($sql);

$headings = array('date','time','average_windspeed','wind_direction','gust_windspeed');


echo '<center>';
echo '<table>';
echo '<tr>';
/* Print the table headings */
foreach ($headings as $heading) {
    echo '<td><b>'.$heading.'</b></td>';
}
echo '</tr>';

/* Print the table results */
foreach($sql_result as $row) {
    echo '<tr>';
    foreach ($headings as $heading) {
        echo '<td>'.$row[$heading].'</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo '</center>';

include('footer.php');

?>
