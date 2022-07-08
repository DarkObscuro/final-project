<?php include '../../view/header.php'; ?>
<main>
    <h1>Players</h1>

    <section>
        <!-- display a table of players -->
        <table>
            <tr>
                <th>Pseudo</th>
                <th>Team</th>
                <th>Job</th>
                <th>Role</th>
                <th>Title</th>
                <th>FC</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['playerPseudo']; ?></td>
                <td><?php echo get_Name_from_ID($player['teamID']); ?></td>
                <td><?php echo $player['playerJob']; ?></td>
                <td><?php echo $player['playerRole']; ?></td>
                <td><?php echo $player['playerTitle']; ?></td>
                <td><?php echo $player['playerFC']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_player">
                    <input type="hidden" name="player_id"
                           value="<?php echo $player['playerID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=player_add_form">Add Player</a></p>     
    </section>

    <p class="last_paragraph"><a href="index.php?action=menu">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>