<?php
require('../../model/database.php');
require('../../model/player_db.php');
require('../../model/raid_db.php');
require('../../model/team_db.php');
require('../../model/raid_boss_db.php');
require('../../model/boss_db.php');
include('../../view/header_stats.php'); 

$raids = get_raids_by_time();
$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
?>

<main>
    <h1><a class="site-logo" href="../../"><i class="fa fa-home" style="font-size:28px;color:white;"></i></a> Timetable</h1>
    <div class="grid-container">
        <?php 
        foreach ($days as $day): 
        ?>
        <div class='<?php echo $day; ?>'>
            <h1><?php echo $day; ?></h1>
            <?php 
            foreach ($raids as $raid) :
            if ($raid['raidDay'] == $day): ?>
            <table>
                <tr>
                    <th><?php echo $raid['raidName']; ?></th>
                    <th>
                        <div class="popup-button">
                            <button data-modal-target="#raid<?php echo $raid['raidID']; ?>">
                                <i class="fa fa-info-circle" style="font-size:25px;color:white;"></i>
                            </button>
                        </div>
                        <div class="modal" id="raid<?php echo $raid['raidID']; ?>">
                            <div class="modal-header">
                                <?php echo $raid['raidName']; ?>
                            </div>
                            <?php 
                                $bosses_ID = get_bosses_from_raid($raid['raidID']);
                                $bosses = array();
                                if (sizeof($bosses_ID) == 0) {
                                    array_push($bosses,'<i>None</i>');
                                } else {
                                    foreach ($bosses_ID as $boss_ID) {
                                        array_push($bosses, get_boss_name_from_id($boss_ID[0]).' ('.get_difficulty_name_from_id(get_boss($boss_ID[0])['difficultyID']).')');
                                    }
                                }
                            ?>
                            <div class="modal-body">
                                <h3>TEAM</h3>
                                <p><?php echo get_Name_from_ID($raid['teamID']); ?></p>
                                <h3>START TIME</h3>
                                <p><?php echo $raid['raidStart']; ?></p>
                                <h3>END TIME</h3>
                                <p><?php echo $raid['raidEnd']; ?></p>
                                <h3>BOSSES</h3>
                                <?php
                                foreach ($bosses as $boss) {
                                    echo '<p>',$boss,'</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div id="overlay"></div>
                    </th>    
                </tr>
                <tr>
                    <td colspan="2"><?php echo $raid['raidStart'],' - ',$raid['raidEnd']; ?></td>
                </tr>
            </table>
            <?php 
            endif;
            endforeach;
            ?>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../../view/footer.php'; ?>