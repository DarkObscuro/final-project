<?php include '../../view/header.php'; ?>
<main>
    <h1>Raids</h1>

    <section>
        <!-- display a table of raids -->
        <table>
            <tr>
                <th>Name</th>
                <th>Team</th>
                <th>Datetime</th>
                <th>Duration</th>
                <th>Bosses</th>
                <th>Add Bosses</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($raids as $raid) : ?>
            <tr>
                <td><?php echo $raid['raidName']; ?></td>
                <td><?php echo get_Name_from_ID($raid['teamID']); ?></td>
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
                    <input type="submit" value="Add">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_raid">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=raid_add_form">Add Raid</a></p>
        <p><a href="?action=raid_team_add_form">Assign Team to a Raid</a></p>
    </section>
    
    <p class="last_paragraph"><a href="index.php?action=menu">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>