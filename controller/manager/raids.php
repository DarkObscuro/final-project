<?php include '../../view/header.php'; ?>
<main>
    <h1>Raids</h1>

    <section>
        <!-- display a table of teams -->
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($teams as $team) : ?>
            <tr>
                <td><?php echo $team['teamName']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_team">
                    <input type="hidden" name="team_id"
                           value="<?php echo $team['teamID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=team_add_form">Add Team</a></p>     
    </section>
    
    <p class="last_paragraph"><a href="index.php?action=menu">Back</a></p>
</main>
<?php include '../../view/footer.php'; ?>