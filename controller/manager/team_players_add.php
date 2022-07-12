<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Players to <?php echo get_team($team_ID)['teamName']?></h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_team_players">

        <input type="hidden" name="team" value=<?php echo $team_ID; ?>>
        <br>

        <label>Players to add to the team:</label><br>
        <select name="players[]" multiple> 
            <?php 
            foreach ($players as $player) {
                if ($player['teamID'] == NULL) {
                    echo "<option value=".$player['playerID'].">".$player['playerPseudo']."</option>";
                }
            }
            ?> 
        </select>
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