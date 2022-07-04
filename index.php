<?php
require('util/main.php');

require('model/database.php');
require('model/player_db.php');

/***************************************
 * Insert a player
 ****************************************/

// Sample data
$player_ID = 1;

/*********************************************
 * Select some player
 **********************************************/

// Get the player
$player = get_player($player_ID);


include 'home.php';
?>