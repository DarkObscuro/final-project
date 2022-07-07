<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Raid</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_raid">

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Date and time:</label>
        <input type="datetime-local" name="datetime" />
        <br>

        <label>Duration:</label>
        <input type="text" name="duration" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Raid" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=raid_manager">Back</a>
    </p>

</main>
<?php include '../../view/footer.php'; ?>