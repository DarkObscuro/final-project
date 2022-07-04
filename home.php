<?php include 'view/header.php'; ?>
<main>
    <h1>Inserted Player List</h1>
    <ul>
        <li> <?php echo 'Id: ', $player['playerID']; ?></li>
        <li> <?php echo 'Pseudo: ', $player['playerPseudo']; ?></li>
        <li> <?php echo 'Job: ', $player['playerJob']; ?></li>
    </ul>
</main><!-- end content -->
<?php include 'view/footer.php'; ?>