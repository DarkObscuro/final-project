<?php include '../../view/header.php'; ?>
<main>
    <h1>Raids</h1>

    <section>
        <!-- display a table of raids -->
        <table>
            <tr>
                <th>Name</th>
                <th>Datetime</th>
                <th>Duration</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($raids as $raid) : ?>
            <tr>
                <td><?php echo $raid['raidName']; ?></td>
                <td><?php echo $raid['raidDate']; ?></td>
                <td><?php echo $raid['raidDuration']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_raid">
                    <input type="hidden" name="raid_id"
                           value="<?php echo $raid['raidID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=raid_add_form">Add Raid</a></p>     
    </section>
    
    <p class="last_paragraph"><a href="index.php?action=menu">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>