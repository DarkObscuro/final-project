<?php include '../../view/header.php'; ?>
<main>
    <h1>Raids</h1>

    <section>
        <!-- display a table of raids -->
        <table>
            <tr>
                <th>Name</th>
                <th>Team</th>
                <th>Assign Team</th>
                <th>Remove Team</th>
                <th>Datetime</th>
                <th>Duration</th>
                <th>Bosses</th>
                <th>Add Bosses</th>
                <th>Remove Bosses</th>
                <th>Delete Raid</th>
            </tr>
            <?php foreach ($raids as $raid) : ?>
            <tr>
                <td><?php echo $raid['raidName']; ?></td>
                <td><?php echo get_Name_from_ID($raid['teamID']); ?></td>
                <td>
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
                </td>
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
                <td><?php echo $raid['raidDate']; ?></td>
                <td><?php echo $raid['raidDuration']; ?></td>
                <td>
                    <?php 
                    $bosses_ID = get_bosses_from_raid($raid['raidID']);
                    $bosses = [sizeof($bosses_ID)];
                    for ($i=0; $i<sizeof($bosses_ID); $i++) {
                        $bosses[$i] = get_boss_name_from_id($bosses_ID[$i][0]);
                    }
                    echo implode(", ",$bosses);
                    ?>
                </td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="raid_bosses_add_form">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-user-plus" style="font-size:42px;color:white;"></i>
                    </button>
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="raid_bosses_remove_form">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-user-times" style="font-size:42px;color:white;"></i>
                    </button>
                </form></td>
                <td><form action="." method="post">
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
                <td colspan="10">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="raid_add_form">
                        <button type="submit" id="completed-task" class="fabutton">
                            <i class="fa fa-calendar-plus-o" style="font-size:42px;color:white;"></i>
                        </button>
                    </form>
                </td> 
            </tr>
        </table>
        <br>
    </section>
</main>
<?php include '../../view/footer.php'; ?>