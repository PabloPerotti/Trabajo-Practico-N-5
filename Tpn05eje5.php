<?php

// Generar aleatoriamente 20 números enteros y guardarlos en un vector
$vector = array();
for ($i = 0; $i < 20; $i++) {
    $vector[] = rand(1, 100);
}

// Mostrar los primeros N valores del vector (N ingresado por el usuario)
echo "Ingrese la cantidad de números que desea ver del vector: ";
$N = (int) readline();
if ($N <= 0 || $N > count($vector)) {
    echo "Ingrese un valor válido para N.\n";
} else {
    echo "Los primeros $N números del vector son: ";
    for ($i = 0; $i < $N; $i++) {
        echo $vector[$i] . " ";
    }
    echo "\n";
}

// Mostrar la suma de los valores pares
$sumaPares = 0;
foreach ($vector as $numero) {
    if ($numero % 2 == 0) {
        $sumaPares += $numero;
    }
}
echo "La suma de los valores pares del vector es: $sumaPares\n";

// Buscar un número dado y mostrar su posición
echo "Ingrese un número a buscar en el vector: ";
$numeroBuscado = (int) readline();
$posicion = array_search($numeroBuscado, $vector);
if ($posicion === false) {
    echo "El número no se encuentra en el vector.\n";
} else {
    echo "El número se encuentra en la posición $posicion del vector.\n";
}

// Verificar si el vector se encuentra ordenado en forma ascendente
$ordenado = true;
for ($i = 0; $i < count($vector) - 1; $i++) {
    if ($vector[$i] > $vector[$i + 1]) {
        $ordenado = false;
        break;
    }
}
if ($ordenado) {
    echo "El vector está ordenado en forma ascendente.\n";
} else {
    echo "El vector no está ordenado en forma ascendente.\n";
}

?>