<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Raid</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_bosses_raid">

        <label>Raid:</label>
        <select name="raid"> <?php foreach ($raids as $raid) echo "<option value=".$raid['raidID'].">".$raid['raidName']."</option>"; ?> </select>
        <br>

        <label>Bosses:</label><br>
        <select name="bosses[]" multiple> 
            <?php 
            foreach ($bosses as $boss) {
                if (is_boss_in_raid($raid_ID, $boss_ID))
                echo "<option value=".$boss['bossID'].">".$boss['bossName']."</option>"; 
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