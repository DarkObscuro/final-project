<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Raid</h1>
    <form action="index.php" method="post">
        <div class="form-input">
        <input type="hidden" name="action" value="add_raid">

        <label>RAID NAME</label>
        <input type="text" name="name" required/>
        <br>

        <label>DAY</label>
        <select name="day" required>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
        <br>

        <label>STARTING TIME</label>
        <input type="time" name="raidstart" required/>
        <br>

        <label>ENDING TIME</label>
        <input type="time" name="raidend" required/>
        <br>

        <button type="submit">Add Raid</button>
        <br>
        </div>
    </form>

</main>
<?php include '../../view/footer.php'; ?>