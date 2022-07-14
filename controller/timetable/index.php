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
?>

<main>
    <h1>Timetable</h1>
    <div class="grid-container">
        <?php foreach ($days as $day): ?>
        <div class='<?php echo $day; ?>'>
            <h1><?php echo $day; ?></h1>
            <?php 
            foreach ($raids as $raid) :
            if ($raid['raidDay'] == $day): ?>
            <table>
                <tr>
                    <th><?php echo $raid['raidName']; ?></th>
                </tr>
                <tr>
                    <td><?php echo get_Name_from_ID($raid['teamID']); ?></td>
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