<?php
use Carbon\Carbon;

/**
 * Convierte un número a su representación en palabras.
 *
 * @param int $number
 * @return string
 */
function convertirNumeroATexto($number)
{
    $f = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
    return $f->format($number);
}

/**
 * Convierte una fecha al formato deseado.
 *
 * @param string $fecha
 * @return string
 */
function formatearFecha($fecha)
{
    // Crear una instancia de Carbon a partir de la fecha
    $carbonFecha = Carbon::parse($fecha);

    // Obtener las partes de la fecha en formato numérico
    $diaNumero = $carbonFecha->day;
    $mesNombre = $carbonFecha->translatedFormat('F'); // Nombre del mes en español
    $anioNumero = $carbonFecha->year;

    // Convertir las partes de la fecha en texto
    $diaTexto = convertirNumeroATexto($diaNumero);
    $anioTexto = convertirNumeroATexto($anioNumero);

    // Construir el formato final
    return "{$carbonFecha->day} de {$mesNombre} del {$carbonFecha->year} ({$diaTexto} de {$mesNombre} del {$anioTexto})";
}

