<?php include '../../view/header.php'; ?>
<main>
    <h1>Teams</h1>
    <?php echo `test`.`lol`; ?>
    <section>
        <!-- display all the teams -->

        <?php foreach ($teams as $team) : ?>
        <table>
            <tr>
                <th colspan="2"><?php echo $team['teamName']; ?></th>
                <th><form action="." method="post">
                    <input type="hidden" name="action" value="delete_team">
                    <input type="hidden" name="team_id" value="<?php echo $team['teamID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-close" style="font-size:20px;color:red;"></i>
                    </button>
                </form></th>
            </tr>
            <?php $players = get_players_from_team($team['teamID']);
            if ($players[0] != 0): 
            foreach ($players as $player): ?>
            <tr>
                <td><img src="../../image/<?php echo get_job_from_ID($player); ?>.png" alt="Job icon"></td>
                <td><?php echo get_pseudo_from_ID($player); ?></td>
                <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_player_from_team">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-user-times" style="font-size:25px;color:red;"></i>
                    </button>
                    </form>
                </td>
            </tr>
            <?php 
            endforeach; 
            endif;
            ?>
            <tr>
                <td colspan="3">
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="team_players_add_form">
                        <input type="hidden" name="team_id"
                            value="<?php echo $team['teamID']; ?>">
                        <button type="submit" id="completed-task" class="fabutton">
                            <i class="fa fa-user-plus" style="font-size:42px;color:white;"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </table>
        <?php endforeach; ?>
        <table>
            <tr>
                <th>ADD A TEAM</th>
            </tr>
            <tr>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="team_add_form">
                        <button type="submit" id="completed-task" class="fabutton">
                            <i class="fa fa-group" style="font-size:42px;color:white;"></i>
                            <i class="fa fa-plus" style="font-size:22px;color:white;"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <table>
    </section>
</main>
<?php include '../../view/footer.php'; ?>