<?php 
require('../../model/database.php');
require('../../model/player_db.php');
require('../../model/raid_db.php');
require('../../model/team_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'menu';
    }
}

if ($action == 'menu') {
    include('menu.php');
} else if ($action == 'player_manager') {
    include('players.php');
} else if ($action == 'team_manager') {
    include('raids.php');
} else if ($action == 'raid_manager') {
    include('teams.php');    
} 

?>