<?php 
require('../../model/database.php');
require('../../model/player_db.php');
require('../../model/raid_db.php');
require('../../model/team_db.php');
require('../../model/raid_boss_db.php');
require('../../model/boss_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'player_manager';
    }
}

/* PLAYER MANAGEMENT SECTION */
if ($action == 'player_manager') {
    $players = get_players();
    $teams = get_teams();
    include('player/players.php');
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error_message = "Missing or incorrect player id.";
        include('../../errors/db_error.php');
    } else { 
        delete_player($player_id);
        header("Location: .?action=player_manager");
    }
} else if ($action == 'delete_player_from_team') {
    $player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error_message = "Missing or incorrect player id.";
        include('../../errors/db_error.php');
    } else { 
        remove_player_ID_from_team($player_id);
        header("Location: .?action=team_manager");
    }
} else if ($action == 'player_add_form') {
    include('player/player_add.php');    
} else if ($action == 'add_player') {
    $player_Pseudo = filter_input(INPUT_POST, 'pseudo');
    $player_Job = filter_input(INPUT_POST, 'job');
    $player_Title = filter_input(INPUT_POST, 'title');
    $player_FC = filter_input(INPUT_POST, 'fc');
    if ($player_Pseudo == NULL || $player_Job == NULL) {
        $error_message = "Invalid player data. Fields must be filled.";
        include('../../errors/db_error.php');
    } else { 
        add_player($player_Pseudo, $player_Job, $player_Title, $player_FC);
        header("Location: .?action=player_manager");
    }

/* TEAM MANAGEMENT SECTION */
} else if ($action == 'team_manager') {
    $teams = get_teams();
    include('team/teams.php');
} else if ($action == 'delete_team') {
    $team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
    if ($team_id == NULL || $team_id == FALSE) {
        $error_message = "Missing or incorrect team id.";
        include('../../errors/db_error.php');
    } else { 
        delete_team($team_id);
        header("Location: .?action=team_manager");
    }
} else if ($action == 'team_add_form') {
    include('team/team_add.php');
} else if ($action == 'team_players_add_form') {
    $team_ID = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
    $players = get_players();
    include('team/team_players_add.php');
} else if ($action == 'add_team') {
    $teamName = filter_input(INPUT_POST, 'name');
    if ($teamName == NULL) {
        $error_message = "Invalid team name. Field must be filled.";
        include('../../errors/db_error.php');
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
        header("Location: .?action=team_manager");
    }

/* RAID MANAGEMENT SECTION */
} else if ($action == 'raid_manager') {
    $raids = get_raids();
    $teams = get_teams();
    include('raid/raids.php');
} else if ($action == 'delete_raid') {
    $raid_id = filter_input(INPUT_POST, 'raid_id', FILTER_VALIDATE_INT);
    if ($raid_id == NULL || $raid_id == FALSE) {
        $error_message = "Missing or incorrect raid id.";
        include('../../errors/db_error.php');
    } else { 
        delete_raid($raid_id);
        header("Location: .?action=raid_manager");
    }
} else if ($action == 'delete_team_from_raid') {
    $raid_id = filter_input(INPUT_POST, 'raid_id', FILTER_VALIDATE_INT);
    if ($raid_id == NULL || $raid_id == FALSE) {
        $error_message = "Missing or incorrect player id.";
        include('../../errors/db_error.php');
    } else { 
        remove_raid_ID_from_team($raid_id);
        header("Location: .?action=raid_manager");
    }
} else if ($action == 'raid_add_form') {
    include('raid/raid_add.php');       
} else if ($action == 'raid_team_add_form') {
    $teams = get_teams();
    $raid_ID = filter_input(INPUT_POST, 'raid_id', FILTER_VALIDATE_INT);
    include('raid/raid_team_add.php');       
} else if ($action == 'raid_bosses_add_form') {
    $bosses = get_bosses();
    $raid_ID = filter_input(INPUT_POST, 'raid_id', FILTER_VALIDATE_INT);
    if ($raid_ID == NULL || $raid_ID == FALSE) {
        $error_message = "Missing or incorrect raid id.";
        include('../../errors/db_error.php');
    } else { 
        include('raid/raid_bosses_add.php');
    }      
} else if ($action == 'raid_bosses_remove_form') {
    $bosses = get_bosses();
    $raid_ID = filter_input(INPUT_POST, 'raid_id', FILTER_VALIDATE_INT);
    if ($raid_ID == NULL || $raid_ID == FALSE) {
        $error_message = "Missing or incorrect raid id.";
        include('../../errors/db_error.php');
    } else { 
        include('raid/raid_bosses_remove.php');
    }
} else if ($action == 'add_raid') {
    $raid_Name = filter_input(INPUT_POST, 'name');
    $raid_Day = filter_input(INPUT_POST, 'day');
    $raid_Start = filter_input(INPUT_POST, 'raidstart');
    $raid_End = filter_input(INPUT_POST, 'raidend');
    if ($raid_Name == NULL || $raid_Day == NULL || $raid_Start == NULL || $raid_End == NULL) {
        $error_message = "Invalid raid data. Fields must be filled.";
        include('../../errors/db_error.php');
    } else { 
        add_raid($raid_Name, $raid_Day, $raid_Start, $raid_End);
        header("Location: .?action=raid_manager");
    }
} else if ($action == 'add_team_raid') {
    $team_selected_ID = filter_input(INPUT_POST, 'team');
    $raid_selected_ID = filter_input(INPUT_POST, 'raid');
    if ($team_selected_ID == NULL || $raid_selected_ID == NULL) {
        $error_message = "Invalid raid data. Fields must be filled.";
        include('../../errors/db_error.php');
    } else { 
        add_team_to_raid($team_selected_ID, $raid_selected_ID);
        header("Location: .?action=raid_manager");
    }
} else if ($action == 'add_bosses_raid') {
    $raid_selected_ID = filter_input(INPUT_POST, 'raid');
    if(isset($_POST["bosses"])) {  
        { 
            foreach ($_POST['bosses'] as $boss_selected_ID)  
            add_raid_boss($raid_selected_ID, $boss_selected_ID); 
        }
        header("Location: .?action=raid_manager");
    }
} else if ($action == 'remove_bosses_raid') {
    $raid_selected_ID = filter_input(INPUT_POST, 'raid');
    if(isset($_POST["bosses"])) {  
        { 
            foreach ($_POST['bosses'] as $boss_selected_ID)  
            delete_raid_boss($raid_selected_ID, $boss_selected_ID); 
        }
    }
    header("Location: .?action=raid_manager");
} 
?>

<!-- ACTIVE SECTION MANAGEMENT -->
<script type="text/javascript">
    var action = "<?php echo $action; ?>";
    // Remove the current class from all sections in the header (re-initialisation)
    document.querySelectorAll('.header-main-nav .Item')[0].classList.remove('current');
    document.querySelectorAll('.header-main-nav .Item')[1].classList.remove('current');
    document.querySelectorAll('.header-main-nav .Item')[2].classList.remove('current');

    // Add the current class to the current section
    if(action === 'team_manager' || action === 'team_add_form' || action === 'team_players_add_form') document.querySelectorAll('.header-main-nav .Item')[0].classList.add('current');
    if(action === 'player_manager' || action === 'player_add_form') document.querySelectorAll('.header-main-nav .Item')[1].classList.add('current');
    if(action === 'raid_manager' || action === 'raid_add_form' || action === 'raid_bosses_add_form' || action === 'raid_team_add_form' || action === 'raid_bosses_remove_form') document.querySelectorAll('.header-main-nav .Item')[2].classList.add('current');
</script>