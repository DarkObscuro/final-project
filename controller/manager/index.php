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
    $players = get_players();
    $teams = get_teams();
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
    $teams = get_teams();
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
} else if ($action == 'team_players_add_form') {
    $teams = get_teams();
    $players = get_players();
    include('team_players_add.php');
} else if ($action == 'add_team') {
    $teamName = filter_input(INPUT_POST, 'name');
    if ($teamName == NULL) {
        $error = "Invalid team name. Field must be filled.";
        include('../errors/error.php');
    } else { 
        add_team($teamName);
        header("Location: .?action=team_manager");
    }
} else if ($action == 'add_team_players') {
    $team_selected_ID = filter_input(INPUT_POST, 'team');
    if(isset($_POST["players"])) {  
        { 
            foreach ($_POST['players'] as $player_selected_ID)  
            add_player_to_team($player_selected_ID, $team_selected_ID); 
        }
        header("Location: .?action=player_manager");
    }

} else if ($action == 'raid_manager') {
    $raids = get_raids();
    include('raids.php');
} else if ($action == 'delete_raid') {
    $raid_id = filter_input(INPUT_POST, 'raid_id', FILTER_VALIDATE_INT);
    if ($raid_id == NULL || $raid_id == FALSE) {
        $error = "Missing or incorrect raid id.";
        include('../../errors/error.php');
    } else { 
        delete_raid($raid_id);
        header("Location: .?action=raid_manager");
    }
} else if ($action == 'raid_add_form') {
    include('raid_add.php');    
} else if ($action == 'add_raid') {
    $raid_Name = filter_input(INPUT_POST, 'name');
    $raid_Date = filter_input(INPUT_POST, 'datetime');
    $raid_Duration = filter_input(INPUT_POST, 'duration');
    if ($raid_Name == NULL || $raid_Date == NULL || $raid_Duration == NULL) {
        $error = "Invalid raid data. Fields must be filled.";
        include('../errors/error.php');
    } else { 
        add_raid($raid_Name, $raid_Date, $raid_Duration);
        header("Location: .?action=raid_manager");
    }
} 

?>