<?php include '../../view/header.php'; ?>
<main>
    <h1>Raids</h1>

    <div class="raid-table" style="overflow-x:auto;">
        <!-- display a table of raids -->
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Team</th>
                <th>Assign Team</th>
                <th>Remove Team</th>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
                <th>Bosses</th>
                <th>Add Bosses</th>
                <th>Remove Bosses</th>
                <th>Delete Raid</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($raids as $raid) : ?>
            <tr>
                <td data-label="Name"><?php echo $raid['raidName']; ?></td>
                <td data-label="Team"><?php echo get_Name_from_ID($raid['teamID']); ?></td>
                <td data-label="Assign Team">
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="raid_team_add_form">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-group" style="font-size:42px;color:white;"></i>
                        <i class="fa fa-plus" style="font-size:22px;color:white;"></i>
                    </button>
                    </form>
                </td data-label="Remove Team">
                <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_team_from_raid">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-group" style="font-size:42px;color:white;"></i>
                        <i class="fa fa-minus" style="font-size:22px;color:white;"></i>
                    </button>
                    </form>
                </td>
                <td data-label="Day"><?php echo $raid['raidDay']; ?></td>
                <td data-label="Start"><?php echo $raid['raidStart']; ?></td>
                <td data-label="End"><?php echo $raid['raidEnd']; ?></td>
                <td data-label="Bosses">
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
                    foreach ($bosses as $boss) {
                        echo '<p>',$boss,'</p>';
                    }
                    ?>
                </td>
                <td data-label="Add Bosses"><form action="." method="post">
                    <input type="hidden" name="action"
                           value="raid_bosses_add_form">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-user-plus" style="font-size:42px;color:white;"></i>
                    </button>
                </form></td>
                <td data-label="Remove Bosses"><form action="." method="post">
                    <input type="hidden" name="action"
                           value="raid_bosses_remove_form">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-user-times" style="font-size:42px;color:white;"></i>
                    </button>
                </form></td>
                <td data-label="Delete Raid"><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_raid">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-close" style="font-size:42px;color:red;"></i>
                    </button>
                </form></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="11">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="raid_add_form">
                        <button type="submit" id="completed-task" class="fabutton">
                            <i class="fa fa-calendar-plus-o" style="font-size:42px;color:white;"></i>
                        </button>
                    </form>
                </td> 
            </tr>
            </tbody>
        </table>
        <br>
    </div>
</main>
<?php include '../../view/footer.php'; ?>