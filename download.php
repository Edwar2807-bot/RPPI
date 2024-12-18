<?php
// Asegúrate de que se recibe el nombre del archivo
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filepath = "uploads/" . $file;

    // Verifica si el archivo existe
    if (file_exists($filepath)) {
        // Establece las cabeceras adecuadas
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Limpia el búfer de salida
        ob_clean();
        flush();

        // Lee el archivo y envíalo al navegador
        readfile($filepath);
        exit;
    } else {
        echo 'El archivo no existe.';
    }
} else {
    echo 'No se especificó ningún archivo.';
}
?>
