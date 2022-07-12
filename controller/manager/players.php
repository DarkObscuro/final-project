<?php include '../../view/header.php'; ?>
<main>
    <h1>Players</h1>

    <section>
        <!-- display a table of players -->
        <table class="players_table">
            <tr>
                <th>Job</th>
                <th>Pseudo</th>
                <th>Team</th>
                <th>Leave Team</th>
                <th>Role</th>
                <th>Title</th>
                <th>FC</th>
                <th>Delete Player</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><img src="../../image/<?php echo $player['playerJob']; ?>.png" alt="Job icon"></td>
                <td><?php echo $player['playerPseudo']; ?></td>
                <td><?php echo get_Name_from_ID($player['teamID']); ?></td>
                <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_player_from_team">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['playerID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-sign-out" style="font-size:42px;color:white;"></i>
                    </button>
                    </form>
                </td>
                <td><?php echo $player['playerRole']; ?></td>
                <td><?php echo $player['playerTitle']; ?></td>
                <td><?php echo $player['playerFC']; ?></td>
                <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_player">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['playerID']; ?>">
                    <button type="submit" id="completed-task" class="fabutton">
                        <i class="fa fa-close" style="font-size:42px;color:red;"></i>
                    </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="a-button"><a href="?action=player_add_form">Add Player</a></p>     
    </section>
</main>
<?php include '../../view/footer.php'; ?>