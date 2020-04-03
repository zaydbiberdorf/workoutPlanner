<?php 
    include("connect_to_db.php");

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM workouts WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]); 
        $workout = $stmt->fetchAll();
    }
?>

<?php include('header.php'); ?>
<h1><?php echo $workouts['title'] ?></h1>



<?php include('footer.php'); ?>