<?php
/**
 * 1. Connect to local MySQL Server (XAMPP)
 */

 $servname = "root";
 $dbname = "course_calendar";
 $pwd = ""
 $conn = new mysqli("localhost", $servname, $pwd, $dbname);
 $conn->set_charset("utf8mb4");