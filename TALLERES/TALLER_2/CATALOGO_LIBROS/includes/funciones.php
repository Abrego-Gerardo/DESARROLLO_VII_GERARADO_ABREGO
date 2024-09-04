<?php
function obtenerLibros() {
    return [
        [
            'titulo' => 'El Quijote',
            'autor' => 'Miguel de Cervantes',
            'año_publicacion' => 1605,
            'genero' => 'Novela',
            'descripcion' => 'La historia del ingenioso hidalgo Don Quijote de la Mancha.'
        ],

        [
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'año_publicacion' => 1967,
            'genero' => 'Realismo mágico',
            'descripcion' => 'Crónica de la familia Buendía en el pueblo ficticio de Macondo.'
        ],

        [
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'año_publicacion' => 1949,
            'genero' => 'Distopía',
            'descripcion' => 'Una novela sobre un futuro totalitario y la vigilancia estatal.'
        ],

        [
            'titulo' => 'Orgullo y prejuicio',
            'autor' => 'Jane Austen',
            'año_publicacion' => 1813,
            'genero' => 'Romántico',
            'descripcion' => 'Una novela que explora las cuestiones del matrimonio y las relaciones sociales.'
        ],

        [
            'titulo' => 'El Hobbit',
            'autor' => 'J.R.R. Tolkien',
            'año_publicacion' => 1937,
            'genero' => 'Fantasía',
            'descripcion' => 'La aventura de Bilbo Baggins en la Tierra Media.'
        ],

        [
            'titulo' => 'Don Juan Tenorio',
            'autor' => 'Tirso de Molina',
            'anio_publicacion' => 1630,
            'genero' => 'Teatro',
            'descripcion' => 'La historia del famoso seductor Don Juan y sus andanzas amorosas.'
        ],

        [
            'titulo' => 'Los detectives salvajes',
            'autor' => 'Roberto Bolaño',
            'anio_publicacion' => 1998,
            'genero' => 'Novela',
            'descripcion' => 'Una novela sobre dos poetas jóvenes en busca de una figura literaria perdida.'
        ]
    ];
}

function mostrarDetallesLibro($libro) {
    return "
        <div class='libro'>
            <h3>{$libro['titulo']}</h3>
            <p><strong>Autor:</strong> {$libro['autor']}</p>
            <p><strong>Año de Publicación:</strong> {$libro['anio_publicacion']}</p>
            <p><strong>Género:</strong> {$libro['genero']}</p>
            <p><strong>Descripción:</strong> {$libro['descripcion']}</p>
        </div>
    ";
}
?>