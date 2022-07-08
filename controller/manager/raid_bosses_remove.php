<?php include '../../view/header.php'; ?>
<main>
    <h1>Remove Bosses from the Raid</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="remove_bosses_raid">

        <h2><?php echo get_raid($raid_ID)['raidName']?></h2>
        <input type="hidden" name="raid" value=<?php echo $raid_ID; ?>>
        <br>

        <label>Bosses:</label><br>
        <select name="bosses[]" multiple> 
            <?php 
            foreach ($bosses as $boss) {
                if (is_boss_in_raid($raid_ID, $boss['bossID'])) {
                    echo "<option value=".$boss['bossID'].">".$boss['bossName']."</option>";
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
        <a href="index.php?action=raid_manager">Back</a>
    </p>

</main>
<?php include '../../view/footer.php'; ?>