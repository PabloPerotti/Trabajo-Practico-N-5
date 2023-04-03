<?php

// Función para validar que se ingrese un número entero impar
function validarNumero($numero) {
  if (is_numeric($numero) && $numero % 2 != 0) {
    return true;
  }
  return false;
}

// Función para cargar el vector
function cargarVector()
{
  $vector = array();
  $continuar = true;
  while ($continuar) {
    $numero = readline("Ingrese un número entero impar (o 'fin' para terminar): ");
    if ($numero == "fin") {
      $continuar = false;
    } elseif (validarNumero($numero)) {
      array_push($vector, $numero);
      return;
    }
    echo "Error: El número ingresado no es entero o no es impar. Por favor, inténtelo de nuevo.\n";

  }
  return $vector;
}

// Función para verificar si el vector tiene datos repetidos
function verificarRepetidos($vector)
{
  $repetidos = array();
  foreach ($vector as $valor) {
    if (in_array($valor, $repetidos)) {
      continue;
    } elseif (count(array_keys($vector, $valor)) > 1) {
      array_push($repetidos, $valor);
    }
  }
  if (count($repetidos) == 0) {
    echo "El vector no tiene datos repetidos.\n";
    return;
  }
  echo "El vector tiene los siguientes datos repetidos: " . implode(", ", $repetidos) . ".\n";
}

// Función para contar cuántos valores K hay en el vector
function contarValoresK($vector, $k)
{
  $contador = 0;
  foreach ($vector as $valor) {
    if ($valor == $k) {
      $contador++;
    }
  }
  echo "El vector tiene " . $contador . " valores " . $k . ".\n";
}

// Función para calcular el promedio de los datos del vector
function calcularPromedio($vector)
{
  $promedio = array_sum($vector) / count($vector);
  echo "El promedio de los datos del vector es: " . $promedio . ".\n";
  return $promedio;
}

// Función para mostrar la posición y los datos que superan o no el promedio
function mostrarPosicionesYPromedio($vector, $promedio, $superior)
{
  if ($superior) {
    echo "Los datos que superan el promedio son:\n";
    foreach ($vector as $posicion => $valor) {
      if ($valor > $promedio) {
        echo "Posición " . $posicion . ": " . $valor . "\n";
      }
    }
    return;
  }
  echo "Los datos que no superan el promedio son:\n";
  foreach ($vector as $posicion => $valor) {
    if ($valor <= $promedio) {
      echo "Posición " . $posicion . ": " . $valor . "\n";
    }
  }
}

// Menú de opciones
$vector = array();
while (true) {
  echo "¿Qué acción desea realizar?\n";
  echo "a) Cargar el vector.\n";
  echo "b) Verificar si el vector tiene datos repetidos.\n";
  echo "c) Contar cuántos valores K hay en el vector.\n";
  echo "d) Calcular el promedio de los datos del vector.\n";
  echo "e) Mostrar la posición y los datos que superan o no el promedio.\n";
  echo "f) Salir del programa.\n";

  $opcion = readline("Ingrese la opción deseada: ");

  switch ($opcion) {
    case "a":
      $vector = cargarVector();
      break;
    case "b":
      if (empty($vector)) {
        echo "Error: El vector está vacío. Por favor, cargue el vector primero.\n";
      } else {
        verificarRepetidos($vector);
      }
      break;
    case "c":
      if (empty($vector)) {
        echo "Error: El vector está vacío. Por favor, cargue el vector primero.\n";
      } else {
        $k = readline("Ingrese el valor K que desea buscar: ");
        contarValoresK($vector, $k);
      }
      break;
    case "d":
      if (empty($vector)) {
        echo "Error: El vector está vacío. Por favor, cargue el vector primero.\n";
      } else {
        calcularPromedio($vector);
      }
      break;
    case "e":
      if (empty($vector)) {
        echo "Error: El vector está vacío. Por favor, cargue el vector primero.\n";
      } else {
        $promedio = calcularPromedio($vector);
        echo "¿Qué datos desea mostrar?\n";
        echo "a) Los datos que superan el promedio.\n";
        echo "b) Los datos que no superan el promedio.\n";
        $opcion2 = readline("Ingrese la opción deseada: ");
        switch ($opcion2) {
          case "a":
            mostrarPosicionesYPromedio($vector, $promedio, true);
            break;
          case "b":
            mostrarPosicionesYPromedio($vector, $promedio, false);
            break;
          default:
            echo "Error: Opción inválida.\n";
            break;
        }
      }
      break;
    case "f":
      echo "¡Hasta luego!\n";
      exit;
    default:
      echo "Error: Opción inválida.\n";
      break;
  }
}