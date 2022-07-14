<?php
require('../../model/database.php');
require('../../model/player_db.php');
require('../../model/raid_db.php');
require('../../model/team_db.php');
require('../../model/raid_boss_db.php');
require('../../model/boss_db.php');
include('../../view/header_stats.php'); 

$raids = get_raids();
$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

$raid_names = array();
foreach ($days as $day) {
    $raids_per_day = array();
    foreach ($raids as $raid) {
        if ($raid['raidDay'] == $day) {
            array_push($raids_per_day, $raid['raidName']);
        }
    }
    array_push($raid_names, $raids_per_day);
}
?>

<main>
    <h1>Timetable</h1>
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
                            <button data-modal-target="#modal">
                                <i class="fa fa-info-circle" style="font-size:25px;color:white;"></i>
                            </button>
                        </div>
                        <div class="modal" id="modal">
                            <div class="modal-header">
                                <div class="title">
                                    <?php echo $raid['raidName']; ?>
                                </div>
                            </div>
                            <div class="modal-body">
                                <?php echo $raid['raidName']; ?>
                            </div>
                        </div>
                        <div id="overlay"></div>
                    </th>    
                </tr>
                <tr>
                    <td colspan="2"><?php echo $raid['raidStart'],' - ',$raid['raidEnd']; ?></td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo 'Team: ',get_Name_from_ID($raid['teamID']); ?></td>
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