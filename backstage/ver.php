<?php
if(!empty($_GET['id'])){
    include 'conexion.php';
    
    //Pedir la imagen desde la base de datso
    $result = $conn->query("SELECT image FROM img_perfil WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Cargar imagen
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
}
?>