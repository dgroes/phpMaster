<?php
/*
 * Reto #9
 * CÓDIGO MORSE
 * Fecha publicación enunciado: 02/03/22
 * Fecha publicación resolución: 07/03/22
 * Dificultad: MEDIA
 *
 * Enunciado: Crea un programa que sea capaz de transformar texto natural a código morse y viceversa.
 * - Debe detectar automáticamente de qué tipo se trata y realizar la conversión.
 * - En morse se soporta raya "—", punto ".", un espacio " " entre letras o símbolos y dos espacios entre palabras "  ".
 * - El alfabeto morse soportado será el mostrado en https://es.wikipedia.org/wiki/Código_morse.
 */




$morseCode = [
    'A' => '.-', 'B' => '-...', 'C' => '-.-.', 'CH' => '----', 'D' => '-..',
    'E' => '.', 'F' => '..-.', 'G' => '--.', 'H' => '....', 'I' => '..',
    'J' => '.---', 'K' => '-.-', 'L' => '.-..', 'M' => '--', 'N' => '-.',
    'Ñ' => '--.--', 'O' => '---', 'P' => '.--.', 'Q' => '--.-', 'R' => '.-.',
    'S' => '...', 'T' => '-', 'U' => '..-', 'V' => '...-', 'W' => '.--',
    'X' => '-..-', 'Y' => '-.--', 'Z' => '--..', '0' => '-----',
    '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....',
    '6' => '-....', '7' => '--...', '8' => '---..', '9' => '----.', '.' => '.-.-.-',
    ',' => '--..--', '?' => '..--..', '"' => '.-..-.', '/' => '-..-.', ' ' => ' / '
];

function isMorse($input)
{
    return preg_match('/^[.\- \/]+$/', $input);
}

function textToMorse($text, $morseCode)
{
    $text = strtoupper($text);
    $textArray = str_split($text);
    $morseResult = "";

    foreach ($textArray as $char) {
        if (array_key_exists($char, $morseCode)) {
            $morseResult .= $morseCode[$char] . ' ';
        }
    }

    return trim($morseResult);
}

function morseToText($morse, $morseCode)
{
    $inverseMorseCode = array_flip($morseCode);
    $morseArray = explode(' ', $morse);
    $textResult = "";

    foreach ($morseArray as $morseChar) {
        if (array_key_exists($morseChar, $inverseMorseCode)) {
            $textResult .= $inverseMorseCode[$morseChar];
        } else if ($morseChar == '/') {
            $textResult .= ' ';
        }
    }

    return $textResult;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['input']);

    if (isMorse($input)) {
        $result = morseToText($input, $morseCode);
    } else {
        $result = textToMorse($input, $morseCode);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código Morse</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <main class="container-fluid">
        <form method="POST">
            <fieldset>
                <h3>Texto y Morse</h3>
                <label for="input">Texto o Código Morse</label>
                <input type="text" name="input" placeholder="Introduce texto o código Morse" value="<?= htmlspecialchars($_POST['input'] ?? '') ?>">
                <label for="output">Resultado</label>
                <input type="text" name="output" value="<?= $result ?? '' ?>" aria-label="Read-only input" readonly />
            </fieldset>
            <input type="submit" value="Traducir">
        </form>
    </main>
</body>

</html>