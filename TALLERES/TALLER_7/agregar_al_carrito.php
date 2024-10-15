<?php
include 'config_sesion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'])) {
    $producto_id = intval($_POST['producto_id']);
    
    $productos = [
        1 => ["nombre" => "Producto 1", "precio" => 10],
        2 => ["nombre" => "Producto 2", "precio" => 20],
        3 => ["nombre" => "Producto 3", "precio" => 45],
        4 => ["nombre" => "Producto 4", "precio" => 36],
        5 => ["nombre" => "Producto 5", "precio" => 52],
    ];

    if (isset($productos[$producto_id])) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad'] += 1;
        } else {
            $_SESSION['carrito'][$producto_id] = [
                "nombre" => $productos[$producto_id]['nombre'],
                "precio" => $productos[$producto_id]['precio'],
                "cantidad" => 1,
            ];
        }
    }
}

header("Location: ver_carrito.php");
exit();