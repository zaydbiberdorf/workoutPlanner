<?php
include('connect_to_db.php');
if(isset($_POST['submit'])){
    $sql = "INSERT INTO workouts (title, description, setnum, repnum) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["newTitle"], $_POST["newdesc"], $_POST["newset"], $_POST["newrep"]]);
    header('Location: index.php');
}

?>
<?php include('header.php');?>
    <h1 class="text-center">Add A Workout</h1>
    <form action="add.php" method="POST">
        <div class="container text-center border rounded-lg bg-primary pt-3 pb-3 ">
            <h3 class="pb-3">Title <input type="text" name="newTitle"></h3>
            <h3 class="pb-3">description: <input type="text" name="newdesc"></h3>
            <h3 class="pb-3">number of sets: <input type="number" name="newset"> </h3>
            <h3 class="pb-3">number of reps: <input type="number" name="newrep"></h3>
            <input class="btn btn-success " type="submit" name="submit">
        </div>
    </form>

<?php include('footer.php');?>