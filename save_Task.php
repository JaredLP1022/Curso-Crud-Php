<?php 

//SE incluye la conexion
include("db.php");

//se Mnadan los datos con el metodo POST
if (isset($_POST['save_task'])){
    //Obtenemos el titulo
    $title = $_POST['title'];
    //Obtenemos la descripcion
    $description = $_POST['description'];

    //Hacemos la consulta sql de para guardar datos 
    $query = "INSERT INTO task(title, description) VALUES ('$title','$description')";

    //Obtenemos los datos y lo mandamos 
    $result = mysqli_query($conn, $query);

    
    if(!$result){
        die("Query Failed");//error por si falla
    }

    //mensaje para el usuario
    $_SESSION['message'] = 'Task saved successfully';
    
    //color del mensaje satisfactorio 
    $_SESSION['message_type'] = 'success';

    //se redirige a la misma pagina pero sin la informacion que se escribio anteriormente
    header("Location: index.php");

}

?>