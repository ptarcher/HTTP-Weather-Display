<?php
/*
 *  Description: Connect to the database and store any session information
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

include('config.php');

try {
    $dbh = new PDO($db_type.':host='.$db_host.';dbname='.$db_name,$db_user,$db_password);
} catch (PDOException $e) {
    if ($debug) {
        printf("Error!: %s<br>", $e->getMessage());
    } else {
        printf("Unable to connect to database");
    }
    die();
}

?>
