<?php

// Definir el tamaño del vector
$n = 10;

// Crear un vector vacío
$vector = array();

// Cargar el vector con valores aleatorios únicos
for ($i = 0; $i < $n; $i++) {
    // Generar un valor aleatorio
    $valor = rand(100, 999);
    
    // Verificar si el valor ya existe en el vector
    while (in_array($valor, $vector)) {
        // Si el valor ya existe, generar otro valor aleatorio
        $valor = rand(100, 999);
    }
    
    // Cargar el valor aleatorio en el vector
    $vector[$i] = $valor;
}

// Mostrar el vector cargado con valores únicos
echo "Vector cargado con valores únicos:\n";
for ($i = 0; $i < $n; $i++) {
    echo $vector[$i] . " ";
}
echo "\n";