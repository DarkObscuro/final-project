<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Team</h1>
    <form action="index.php" method="post">
        <div class="form-input">
            <input type="hidden" name="action" value="add_team">
            
            <label>TEAM NAME</label>
            <input type="text" name="name" required/>
            <br>
            <button type="submit">Add Team</button>
        </div>
        <br>
    </form>

</main>
<?php include '../../view/footer.php'; ?>