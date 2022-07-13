<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Player</h1>
    <form action="index.php" method="post">
        <div class="form-input">
        <input type="hidden" name="action" value="add_player">

        <label>PSEUDO</label>
        <input type="text" name="pseudo" required/>
        <br>

        <label>JOB</label>
        <select name="job" required>
            <option value="Paladin">Paladin</option>
            <option value="Warrior">Warrior</option>
            <option value="Dark Knight">Dark Knight</option>
            <option value="Gunbreaker">Gunbreaker</option>

            <option value="White Mage">White Mage</option>
            <option value="Scholar">Scholar</option>
            <option value="Astrologian">Astrologian</option>
            <option value="Sage">Sage</option>

            <option value="Monk">Monk</option>
            <option value="Dragoon">Dragoon</option>
            <option value="Ninja">Ninja</option>
            <option value="Samurai">Samurai</option>
            <option value="Reaper">Reaper</option>

            <option value="Bard">Bard</option>
            <option value="Machinist">Machinist</option>
            <option value="Dancer">Dancer</option>

            <option value="Black Mage">Black Mage</option>
            <option value="Summoner">Summoner</option>
            <option value="Red Mage">Red Mage</option>
        </select>
        <br>

        <label>TITLE</label>
        <input type="text" name="title"/>
        <br>

        <label>FREE COMPANY</label>
        <input type="text" name="fc"/>
        <br>

        <button type="submit">Add Player</button>
        <br>
        </div>
    </form>

</main>
<?php include '../../view/footer.php'; ?>