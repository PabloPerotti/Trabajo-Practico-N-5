<?php

// Función para calcular el promedio de un array
function promedio($array) {
  $sum = array_sum($array);
  return $sum / count($array);
}

// Función para verificar si un array está ordenado en forma descendente
function estaOrdenadoDescendente($array) {
  $n = count($array);
  for ($i = 0; $i < $n - 1; $i++) {
    if ($array[$i] < $array[$i + 1]) {
      return false;
    }
  }
  return true;
}

// Función para obtener el mínimo y su posición en un array
function obtenerMinimo($array) {
  $min = $array[0];
  $pos = 0;
  $n = count($array);
  for ($i = 1; $i < $n; $i++) {
    if ($array[$i] < $min) {
      $min = $array[$i];
      $pos = $i;
    }
  }
  return [$min, $pos];
}

// Función para cargar el vector con N números reales
function cargarVector(&$vector) {
  $N = intval(readline("Ingrese la cantidad de números a ingresar: "));
  for ($i = 0; $i < $N; $i++) {
    $numero = floatval(readline("Ingrese el número en la posición " . $i . ": "));
    $vector[] = $numero;
  }
}

// Función para mostrar los números que superan al promedio
function superanPromedio($vector) {
  $prom = promedio($vector);
  echo "El promedio es: " . $prom . "\n";
  echo "Los números que superan al promedio son: ";
  foreach ($vector as $numero) {
    if ($numero > $prom) {
      echo $numero . " ";
    }
  }
  echo "\n";
}

// Función para verificar si los elementos del vector se hallan ordenados en forma descendente
function verificarDescendente($vector) {
  if (estaOrdenadoDescendente($vector)) {
    return true;
  } else 
    return false;  
}

// Función para obtener el mínimo con su posición en el vector
function posMinimo($vector) {
  list($min, $pos) = obtenerMinimo($vector);
  return $pos;
}

// Función para mostrar el vector
function mostrarVector($vector) {
  echo "El vector es: ";
  foreach ($vector as $numero) {
    echo $numero . " ";
  }
  echo "\n";
}

// Función para mostrar el menú y leer la opción del usuario
function menu(&$opc) {
  echo "Menú de opciones:\n";
  echo "1. Cargar vector.\n";
  echo "2. Mostrar números que superan el promedio.\n";
  echo "3. Verificar si los elementos del vector están ordenados en forma descendente.\n";
  echo "4. Mostrar el mínimo con su posición.\n";
  echo "5. Mostrar el vector.\n";
  echo "0. Salir.\n";
  $opc = intval(readline("Ingrese una opción: "));
}

// PROGRAMA PRINCIPAL

$vector = array();
$opc = -1;

/* PROGRAMA PRINCIPAL */

do {
    Menu($opc);

    switch($opc){
        case 1: 
            cargarVector($array);
            break;
        case 2:
            superanPromedio($array);
            break;
        case 3:
            if (verificarDescendente($array)){
                echo "el vector SI esta ordenado descendentemente" . PHP_EOL;
            } else {
                echo "el vector NO esta ordenado descendentemente". PHP_EOL;
            }
        break;
        case 4:
            $posMin = posMinimo($array);
            echo "el valor minimo es: $array[$posMin] y su posicion es: $posMin";
        break;
        case 5:
            echo 'Mostrar Vector: '. PHP_EOL;
            mostrarVector($array);
        break;
        case 0:
            echo "Fin del programa.";
            break;
        default:
            echo "opcion incorrecta";
            break;
    }
} while ($opc != 0).PHP_EOL;
