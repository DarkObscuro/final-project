<?php include '../../view/header.php'; ?>
<main>
    <h1>Assign a Team to the Raid</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_team_raid">

        <label>Raid:</label>
        <select name="raid"> <?php foreach ($raids as $raid) echo "<option value=".$raid['raidID'].">".$raid['raidName']."</option>"; ?> </select>
        <br>

        <label>Team:</label><br>
        <select name="team"> <?php foreach ($teams as $team) echo "<option value=".$team['teamID'].">".$team['teamName']."</option>"; ?> </select>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Confirm" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=raid_manager">Back</a>
    </p>

</main>
<?php include '../../view/footer.php'; ?>