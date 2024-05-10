<?php
// Obtener tareas desde el archivo (puedes adaptar esto para leer desde una base de datos)
$tareas = file_get_contents('tareas.txt');
$tareas = explode("\n\n", $tareas);

// Crear un array asociativo para organizar tareas por fecha
$tareasPorFecha = array();
foreach ($tareas as $tarea) {
    // Extraer la fecha de la tarea (puedes ajustar esto según el formato real)
    preg_match('/Fecha: (.+)/', $tarea, $matches);
    $fecha = isset($matches[1]) ? $matches[1] : 'Sin fecha';

    // Organizar la tarea en el array asociativo
    $tareasPorFecha[$fecha][] = $tarea;
}

// Obtener el primer y último día del mes actual
$primerDiaMes = date('Y-m-01');
$ultimoDiaMes = date('Y-m-t');

// Mostrar el calendario
echo "<table>";
echo "<tr><th>Día</th><th>Tareas</th></tr>";
$currentDay = strtotime($primerDiaMes);
while ($currentDay <= strtotime($ultimoDiaMes)) {
    $currentDate = date('Y-m-d', $currentDay);
    echo "<tr>";
    echo "<td>$currentDate</td>";
    echo "<td>";
    if (isset($tareasPorFecha[$currentDate])) {
        foreach ($tareasPorFecha[$currentDate] as $tarea) {
            echo "<div style='border: 1px solid #ccc; padding: 5px; margin-bottom: 5px;'>$tarea</div>";
        }
    } else {
        echo "Sin tareas";
    }
    echo "</td>";
    echo "</tr>";
    $currentDay = strtotime('+1 day', $currentDay);
}
echo "</table>";
?>
