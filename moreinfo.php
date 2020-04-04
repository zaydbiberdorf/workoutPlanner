<?php 
    include("connect_to_db.php");

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM workouts WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]); 
        $workout = $stmt->fetch();
    }

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM workouts WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id_to_delete']]);
        header("Location: index.php");
    }
?>

<?php include('header.php'); ?>
<div class="container text-center ">
<h1 class="pb-3"><?php echo $workout['title'] ?></h1>
<h2 class="pb-3"><?php echo $workout['description'] ?></h2>
<h2 class="pb-3"># of reps: <?php echo $workout['repnum'] ?></h2>
<h2 class="pb-3"># of sets: <?php echo $workout['setnum'] ?></h2>
<h3 class="pb-3">time created: <?php echo $workout['date_time'] ?></h3>
<form action="moreinfo.php" method="POST">
    <input class="btn btn-danger" type="submit" name="delete" value="delete"> <a class="btn btn-primary" href="edit.php?id=<?php echo $workout['id']; ?>">edit</a>
    <input type="hidden" name="id_to_delete" value="<?php echo $workout['id'] ?>">
</form>


</div>
<?php include('footer.php'); ?>