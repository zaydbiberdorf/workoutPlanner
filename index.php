<?php
include("connect_to_db.php");
$sql = "SELECT * FROM workouts";
$stmt = $pdo->query($sql);
$workouts = $stmt->fetchAll();



?>
<?php include('header.php');?>(
   
        <?php foreach($workouts as $workout): ?>
            <div class="container mr-3 border rounded-lg border-primary">
                <h3><?php echo htmlspecialchars($workout["title"])?> </h3>
                <p><?php echo htmlspecialchars($workout["description"]) ?></p>
                <p> sets: <?php echo htmlspecialchars($workout["setnum"]) ?> reps: <?php echo htmlspecialchars($workout["repnum"]) ?> </p>
                <a class="btn btn-outline-dark" href="moreinfo.php?id=<?php echo $workout['id']; ?>">More Info</a>
            </div>
        <?php endforeach ?>
            
    

<?php include('footer.php')?>