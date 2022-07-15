<?php include '../../view/header.php'; ?>
<main>
    <h1>Players</h1>

    <div class="normal-table" style="overflow-x:auto;">
        <!-- display a table of players -->
        <table class="players_table">
            <thead>
            <tr>
                <th>Job</th>
                <th>Pseudo</th>
                <th>Role</th>
                <th>Title</th>
                <th>FC</th>
                <th>Delete Player</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td data-label="Job"><img src="../../image/<?php echo $player['playerJob']; ?>.png" alt="Job icon"></td>
                <td data-label="Pseudo"><?php echo $player['playerPseudo']; ?></td>
                <td data-label="Role"><?php echo $player['playerRole']; ?></td>
                <td data-label="Title"><?php echo $player['playerTitle']; ?></td>
                <td data-label="FC"><?php echo $player['playerFC']; ?></td>
                <td data-label="Delete Player">
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
            <tr>
                <td colspan="6">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="player_add_form">
                        <button type="submit" id="completed-task" class="fabutton">
                            <i class="fa fa-user-plus" style="font-size:42px;color:white;"></i>
                        </button>
                    </form>
                </td> 
            </tr>
            </tbody>
        </table>
    </div>
</main>
<?php include '../../view/footer.php'; ?>