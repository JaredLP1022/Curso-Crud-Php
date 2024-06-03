<?php include ("db.php") ?>

<?php include ("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
            } ?>
            <div class="card card-bodym bg-dark" style="height: 350px; margin-top: 50px; color:white;">
            <h4>Agregar una nueva tarea</h4>
                <form action="save_Task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus style="width: 100%; margin-top:15px; height: 45px;">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" rows="2" class="form-control"
                            placeholder="Task Description" style="margin-top:15px; height: 145px;"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-lg btn-block" name="save_task" value="Save_task"
                        style="width:100%; margin-top:15px; height:50px;">

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-dark table-bordered" style="width: 100%;" >
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td> <?php echo $row['title'] ?> </td>
                            <td> <?php echo $row['description'] ?> </td>
                            <td> <?php echo $row['create_at'] ?> </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="delete_Task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include ("includes/footer.php") ?>