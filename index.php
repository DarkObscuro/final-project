<?php 
require('util/main.php');
include ('view/header_home.php'); ?>
<h1>Raid Planner</h1>
<ul>
    <li><a href="controller/manager" data-text="Manager">Manager</a></li>
    <li><a href="controller/timetable" data-text="Timetable">Timetable</a></li>
    <li><a href="controller/statistics" data-text="Statistics">Statistics</a></li>  
</ul> 
<?php include 'view/footer.php'; ?>