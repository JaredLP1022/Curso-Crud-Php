<?php
include ("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row["title"];
        $description = $row["description"];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";

    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';

    header("Location: index.php");

}
?>

<?php include ("includes/header.php") ?>

<div class="conatiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body bg-dark" style="height: 370px; margin-top: 100px;" >
                <h4>Actualizando Tarea</h4>
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>"
                            style="width: 100%; margin-top:15px; height: 45px;">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="update description"
                            style="margin-top:15px; height: 145px;"> <?php echo $description; ?> </textarea>
                    </div>
                    <button class="btn btn-success" name="update" style="width: 100%; margin-top:15px; height:50px;">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("includes/footer.php") ?>