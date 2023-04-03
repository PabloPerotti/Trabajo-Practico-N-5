<?php

function validar_nota($nota)
{
    while ($nota < 1 || $nota > 10) {
        echo "Nota inválida. Debe ser un número entre 1 y 10.\n";
        $nota = readline("Ingrese la nota: ");
    }
    return $nota;
}

$notas = [];
$opciones = ["a", "b", "c", "d", "e", "f", "g", "h"];

do {
    $opcion = strtoupper(readline("Ingrese una opción (a-h): "));
    if (!in_array($opcion, $opciones)) {
        echo "Opción inválida.\n";
        continue;
    }

    switch ($opcion) {
        case "A":
            do {
                $nota = readline("Ingrese la nota: ");
                $nota = validar_nota($nota);
                $notas[] = $nota;
                $continuar = readline("¿Desea ingresar otra nota? (s/n): ");
            } while (strtolower($continuar) === "s");
            break;
        case "B":
            if (empty($notas)) {
                echo "Debe cargar las notas antes de realizar esta operación.\n";
                break;
            }
            echo "Notas ingresadas:\n";
            foreach ($notas as $posicion => $nota) {
                echo $posicion + 1 . ") " . $nota . "\n";
            }
            break;
        case "C":
            if (empty($notas)) {
                echo "Debe cargar las notas antes de realizar esta operación.\n";
                break;
            }
            $promedio = array_sum($notas) / count($notas);
            echo "Promedio: " . $promedio . "\n";
            break;
        case "D":
            if (empty($notas)) {
                echo "Debe cargar las notas antes de realizar esta operación.\n";
                break;
            }
            $promedio = array_sum($notas) / count($notas);
            echo "Notas que superan el promedio:\n";
            foreach ($notas as $posicion => $nota) {
                if ($nota > $promedio) {
                    echo $posicion + 1 . ") " . $nota . "\n";
                }
            }
            break;
        case "E":
            if (empty($notas)) {
                echo "Debe cargar las notas antes de realizar esta operación.\n";
                break;
            }
            $maxima = max($notas);
            $cantidad_maximas = array_count_values($notas)[$maxima];
            echo "La nota máxima es: " . $maxima . "\n";
            echo "Cantidad de alumnos que la obtuvieron: " . $cantidad_maximas . "\n";
            break;
        case "F":
            if (empty($notas)) {
                echo "Debe cargar las notas antes de realizar esta operación.\n";
                break;
            }
            $nota_buscada = readline("Ingrese la nota que desea buscar: ");
            $cantidad_notas_buscadas = array_count_values($notas)[$nota_buscada] ?? 0;
            echo "Cantidad de alumnos que obtuvieron la nota " . $nota_buscada . ": " . $cantidad_notas_buscadas . "\n";
            break;
        case "G":
            if (empty($notas)) {
                echo "Debe cargar las notas antes de realizar esta operación.\n";
                break;
            }
            $maxima = max($notas);
            $minima = min($notas);
            $cantidad_maximas = array_count_values($notas)[$maxima];
            $cantidad_minimas = array_count_values($notas)[$minima];
            $porcentaje_maximas = $cantidad_maximas / count($notas) * 100;
            $porcentaje_minimas = $cantidad_minimas / count($notas) * 100;
            echo "Porcentaje de alumnos que obtuvieron la nota máxima: " . $porcentaje_maximas . "%\n";
            echo "Porcentaje de alumnos que obtuvieron la nota mínima: " . $porcentaje_minimas . "%\n";
            break;
        case "H":
            echo "¡Hasta luego!\n";
            break;
    }

    // Limpiar pantalla
    echo "\033[2J\033[1;1H";

} while ($opcion !== "H");