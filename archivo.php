<?php
declare(strict_types=1);

function imprimir(array $datos): void
{
    echo implode(" ", $datos) . "<br>";
}

function burbuja(array &$datos): void
{
    $tam = count($datos);
    $pasada = 1;
    $ordenado = false;

    while (!$ordenado) {
        $ordenado = true;
        for ($k = 0; $k < $tam - $pasada; $k++) {
            if ($datos[$k] > $datos[$k + 1]) {
                $temp = $datos[$k];
                $datos[$k] = $datos[$k + 1];
                $datos[$k + 1] = $temp;
                $ordenado = false;
            }
        }
        echo "vuelta $pasada: ";
        imprimir($datos);
        $pasada++;
    }
}

function buscarLineal(array $datos, int $valor): int
{
    foreach ($datos as $pos => $elem) {
        if ($elem === $valor) {
            return $pos;
        }
    }
    return -1;
}

function buscarBinaria(array $datos, int $valor): int
{
    $izq = 0;
    $der = count($datos) - 1;

    while ($izq <= $der) {
        $mid = intdiv($izq + $der, 2);
        if ($datos[$mid] == $valor) {
            return $mid;
        }
        if ($valor > $datos[$mid]) {
            $izq = $mid + 1;
        } else {
            $der = $mid - 1;
        }
    }
    return -1;
}

$x = 7;
$lista1 = [8, 1, 7, 0, 9, 10];
$lista2 = [8, 9, 10, 0];
$lista3 = [1, 7, 4, 7];

echo "<h3>Busqueda lineal (x = $x)</h3>";
echo "lista 1 -> " . buscarLineal($lista1, $x) . "<br>";
echo "lista 2 -> " . buscarLineal($lista2, $x) . "<br>";
echo "lista 3 -> " . buscarLineal($lista3, $x) . "<br>";

$arreglo = [8, 1, 7, 9, 10, 1, 0, 10];

echo "<h3>Ordenamiento burbuja</h3>";
echo "cantidad: " . count($arreglo) . "<br>";
echo "antes: ";
imprimir($arreglo);

burbuja($arreglo);

echo "despues: ";
imprimir($arreglo);

echo "<h3>Busqueda binaria</h3>";
$pos = buscarBinaria($arreglo, $x);
if ($pos != -1) {
    echo "el $x esta en la posicion $pos<br>";
} else {
    echo "no se encontro el $x<br>";
}

$pos = buscarBinaria($arreglo, 5);
echo $pos == -1 ? "el 5 no esta en el arreglo" : "el 5 esta en la posicion $pos";
