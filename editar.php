<?php
include("./config.php");

        
// cek apa tombol daftar udah di klik blom
if (isset($_POST['editar_datos'])) {
    // ambil data dari form
   
    $editar_Id_Zapato = $_POST['editar_Id_Zapato'];
    $editar_Id_Proveedor = $_POST['editar_Id_Proveedor'];
    $editar_Estilo = $_POST['editar_Estilo'];
    $editar_Color = $_POST['editar_Color'];
    $editar_Precio = $_POST['editar_Precio'];
    $editar_Descripcion = $_POST['editar_Descripcion'];
    $editar_Talla = $_POST['editar_Talla'];
    $editar_Id_Venta = $_POST['editar_Id_Venta'];

    // query
    $sql = "UPDATE zapatos SET Id_Proveedor='$editar_Id_Proveedor', Estilo='$editar_Estilo', Color='$editar_Color', Precio='$editar_Precio', Descripcion='$editar_Descripcion', Talla='$editar_Talla', Id_Venta='$editar_Id_Venta' WHERE Id_Zapato = '$editar_Id_Zapato'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
