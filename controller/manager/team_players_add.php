<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Players to <?php echo get_team($team_ID)['teamName']?></h1>
    <form action="index.php" method="post">
        <div class="form-input">
        <input type="hidden" name="action" value="add_team_players">

        <input type="hidden" name="team" value=<?php echo $team_ID; ?>>
        <br>

        <label>PLAYERS TO ADD</label>
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
        <button type="submit">Confirm</button>
        <br>
        </div>
    </form>

</main>
<?php include '../../view/footer.php'; ?>