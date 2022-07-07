<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Players to a Team</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_team_players">

        <label>Team:</label>
        <select name="team"> <?php foreach ($teams as $team) echo "<option value=".$team['teamID'].">".$team['teamName']."</option>"; ?> </select>
        <br>

        <label>Players to add to the team:</label><br>
        <select name="players[]" multiple> <?php foreach ($players as $player) echo "<option value=".$player['playerID'].">".$player['playerPseudo']."</option>"; ?> </select>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Confirm" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=team_manager">Back</a>
    </p>

</main>
<?php include '../../view/footer.php'; ?>