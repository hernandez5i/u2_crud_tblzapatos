<?php
include("./config.php");

if (isset($_POST['eliminardatos'])) {
    // tomar el id
    $id = $_POST['eliminar_id'];

    // query hapus
    $sql = "DELETE FROM zapatos WHERE Id_Zapato = '$id'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./index.php?eliminar=Exitoso');
    } else
        die('Location: ./index.php?eliminar=Error');
} else
    die("Acceso prohibido....");
