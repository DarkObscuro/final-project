<?php include '../../view/header.php'; ?>
<main>
    <h1>Teams</h1>
    <?php echo `test`.`lol`; ?>
    <section>
        <!-- display a table of teams -->
        <table>
            <tr>
                <th>Name</th>
                <th>Delete Team</th>
            </tr>
            <?php foreach ($teams as $team) : ?>
            <tr>
                <td><?php echo $team['teamName']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_team">
                    <input type="hidden" name="team_id" value="<?php echo $team['teamID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-close" style="font-size:42px;color:red;"></i>
                    </button>
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="a-button"><a href="?action=team_add_form">Add Team</a></p>
        <p class="a-button"><a href="?action=team_players_add_form">Add Players to a Team</a></p>    
    </section>
</main>
<?php include '../../view/footer.php'; ?>