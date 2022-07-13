<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Raid</h1>
    <form action="index.php" method="post">
        <div class="form-input">
        <input type="hidden" name="action" value="add_raid">

        <label>RAID NAME</label>
        <input type="text" name="name" required/>
        <br>

        <label>DATE AND TIME</label>
        <input type="datetime-local" name="datetime" required/>
        <br>

        <label>DURATION</label>
        <input type="text" name="duration" required/>
        <br>

        <button type="submit">Add Raid</button>
        <br>
        </div>
    </form>

</main>
<?php include '../../view/footer.php'; ?>