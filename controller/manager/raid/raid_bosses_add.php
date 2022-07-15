<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Bosses to [<?php echo get_raid($raid_ID)['raidName']?>]</h1>
    <form action="index.php" method="post">
        <div class="form-input">
        <input type="hidden" name="action" value="add_bosses_raid">

        <label>RAID</label>
        <input type="text" value="<?php echo get_raid($raid_ID)['raidName']?>" readonly disabled style='color:grey;'/>
        <input type="hidden" name="raid" value=<?php echo $raid_ID; ?>>
        <br>

        <label>BOSSES TO ADD</label>
        <select name="bosses[]" multiple> 
            <?php 
            foreach ($bosses as $boss) {
                if (!is_boss_in_raid($raid_ID, $boss['bossID'])) {
                    echo "<option value=".$boss['bossID'].">".$boss['bossName']." (".get_difficulty_name_from_id(get_boss($boss['bossID'])['difficultyID']).")</option>";
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