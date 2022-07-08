<?php include '../../view/header.php'; ?>
<main>
    <h1>Add Player</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_player">

        <label>Pseudo:</label>
        <input type="text" name="pseudo" />
        <br>

        <label>Job:</label>
        <select name="job">
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