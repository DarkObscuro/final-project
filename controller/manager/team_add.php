<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Team</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_team">

        <label>Name:</label>
        <input type="text" name="name" required/>
        <input type="submit" value="Add Team" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=team_manager">Back</a>
    </p>

</main>
<?php include '../../view/footer.php'; ?>