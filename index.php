<?php
require('util/main.php');

require('model/database.php');
require('model/player_db.php');

$player_ID = 1;
$player = get_player($player_ID);


include 'home.php';
?>