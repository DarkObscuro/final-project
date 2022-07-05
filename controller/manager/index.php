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
    $players =  get_players();
    include('players.php');
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id.";
        include('../errors/error.php');
    } else { 
        delete_player($player_id);
        header("Location: .?action=player_manager");
    }
} else if ($action == 'player_add_form') {
    include('player_add.php');    
} else if ($action == 'add_player') {
    $player_Pseudo = filter_input(INPUT_POST, 'pseudo');
    $player_Job = filter_input(INPUT_POST, 'job');
    $player_Title = filter_input(INPUT_POST, 'title');
    $player_FC = filter_input(INPUT_POST, 'fc');
    if ($player_Pseudo == NULL || $player_Job == NULL) {
        $error = "Invalid player data. Fields must be filled.";
        include('../errors/error.php');
    } else { 
        add_player($player_Pseudo, $player_Job, $player_Title, $player_FC);
        header("Location: .?action=player_manager");
    }


} else if ($action == 'team_manager') {
    $teams =  get_teams();
    include('teams.php');
} else if ($action == 'delete_team') {
    $team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
    if ($team_id == NULL || $team_id == FALSE) {
        $error = "Missing or incorrect team id.";
        include('../errors/error.php');
    } else { 
        delete_team($team_id);
        header("Location: .?action=team_manager");
    }
} else if ($action == 'team_add_form') {
    include('team_add.php');    
} else if ($action == 'add_team') {
    $teamName = filter_input(INPUT_POST, 'name');
    if ($teamName == NULL) {
        $error = "Invalid team name. Field must be filled.";
        include('../errors/error.php');
    } else { 
        add_team($teamName);
        header("Location: .?action=team_manager");
    }

} else if ($action == 'raid_manager') {
    include('raids.php');    
} 

?>