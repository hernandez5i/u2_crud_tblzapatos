<?php
include("./config.php");

// Compruebe si se ha hecho clic en el botón de agregar o no
if (isset($_POST['agregar'])) {
    // recuperar datos del formulario
    $Id_Proveedor = $_POST['Id_Proveedor'];
    $Estilo = $_POST['Estilo'];
    $Color = $_POST['Color'];
    $Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion'];
    $Talla = $_POST['Talla'];
    $Id_Venta = $_POST['Id_Venta'];

    // query
    $sql = "INSERT INTO zapatos(Id_Proveedor, Estilo, Color, Precio, Descripcion, Talla,Id_Venta)
    VALUES('$Id_Proveedor', '$Estilo', '$Color', '$Precio', '$Descripcion', '$Talla', '$Id_Venta')";
    $query = mysqli_query($db, $sql);

    // Comprueba si la consulta se guardó correctamente
    if ($query)
        header('Location: ./index.php?Descripcion=Exitoso');
    else
        header('Location: ./index.php?Descripcion=Error');
} else
    die("Acceso prohibido....");
