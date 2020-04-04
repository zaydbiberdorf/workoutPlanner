<?php 
    include("connect_to_db.php");

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM workouts WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]); 
        $workout = $stmt->fetch();
    }

    if(isset($_POST['submit'])){
        $sql = "UPDATE workouts SET title=?, description=?, setnum=?, repnum=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['newTitle'], $_POST['newdesc'], $_POST['newset'], $_POST['newrep'], $_POST['id_to_edit']]);
        header('Location: index.php');
    }
?>

<?php include('header.php');?>
    <h1 class="text-center">Edit Your Workout</h1>
    <form action="edit.php" method="POST">
        <div class="container text-center border rounded-lg bg-primary pt-3 pb-3 ">
            <h3 class="pb-3">Title <input type="text" name="newTitle" value="<?php echo $workout['title']; ?>"></h3>
            <h3 class="pb-3">description: <input type="text" name="newdesc" value="<?php echo $workout['description']; ?>"></h3>
            <h3 class="pb-3">number of sets: <input type="number" name="newset" value="<?php echo $workout['setnum']; ?>"> </h3>
            <h3 class="pb-3">number of reps: <input type="number" name="newrep" value="<?php echo $workout['repnum']; ?>"></h3>
            <input class="btn btn-success " type="submit" name="submit" value="save changes">
            <input type="hidden" name="id_to_edit" value="<?php echo $workout['id']; ?>">
        </div>
    </form>

<?php include('footer.php');?>