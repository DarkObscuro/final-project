<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Player</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_player">

        <label>Pseudo:</label>
        <input type="text" name="pseudo" />
        <br>

        <label>Job:</label>
        <input type="text" name="job" />
        <br>

        <label>Title:</label>
        <input type="text" name="title" />
        <br>

        <label>FC:</label>
        <input type="text" name="fc" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Player" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=player_manager">Back</a>
    </p>

</main>
<?php include '../../view/footer.php'; ?>