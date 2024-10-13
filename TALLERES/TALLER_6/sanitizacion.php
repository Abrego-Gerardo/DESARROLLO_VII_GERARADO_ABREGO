<?php
function sanitizarNombre($nombre) {
    return htmlspecialchars(trim($nombre));
}

function sanitizarEmail($email) {
    return htmlspecialchars(trim($email));
}

function sanitizarFecha_nacimiento($fecha) {
    return htmlspecialchars(trim($fecha)); // Sanitiza la fecha
}

function sanitizarSitioWeb($sitioWeb) {
    return htmlspecialchars(trim($sitioWeb)); // Asegúrate de que sea el mismo nombre aquí
}

function sanitizarGenero($genero) {
    return htmlspecialchars(trim($genero));
}

function sanitizarIntereses($intereses) {
    return array_map(function($interes) {
        return htmlspecialchars(trim($interes));
    }, $intereses);
}

function sanitizarComentarios($comentarios) {
    return htmlspecialchars(trim($comentarios), ENT_QUOTES, 'UTF-8');
}
?>

