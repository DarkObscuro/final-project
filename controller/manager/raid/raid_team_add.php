<?php include '../../view/header.php'; ?>
<main>
    <h1>Assign a Team to [<?php echo get_raid($raid_ID)['raidName']?>]</h1>
    <form action="index.php" method="post">
        <div class="form-input">
        <input type="hidden" name="action" value="add_team_raid">

        <label>RAID</label>
        <input type="text" value="<?php echo get_raid($raid_ID)['raidName']?>" readonly disabled style='color:grey;'/>
        <input type="hidden" name="raid" value=<?php echo $raid_ID; ?>>

        <br>
        <label>TEAM</label>
        <select name="team"> <?php foreach ($teams as $team) echo "<option value=".$team['teamID'].">".$team['teamName']."</option>"; ?> </select>
        <br>

        <button type="submit">Confirm</button>
        <br>
        </div>
    </form>

</main>
<?php include '../../view/footer.php'; ?>