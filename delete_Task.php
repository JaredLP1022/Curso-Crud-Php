<?php
    //incluimos la conexcion de la base de datos
    include ("db.php");

    //vericamos que exista el id que se desea eliminar 
    if (isset($_GET['id'])) {
        //obtenemos el id a eliminar 
        $id = $_GET['id'];
        //ejecutamos la sentencia de sql para eliminar un elemento de la base de datos
        $query = "DELETE FROM task WHERE id= $id";
        //se manda el query a la base de datos y se elimina
        $result = mysqli_query($conn, $query);
        if(!$result){//se buscan resultados
            die("Quey Failed");//si falla aqui se manda un error
        }
        //se agrega el mensaje de sesion para que lo visualize el usuario cuando elimina una tarea
        $_SESSION['message'] = 'Task Removed Successfully';
        //se le da un color para que sepa que esta eliminando
        $_SESSION['message_type'] = 'danger';
        //redirigimos al usurio a la pagina principal actualizada
        header("Location: index.php");
    }
?>