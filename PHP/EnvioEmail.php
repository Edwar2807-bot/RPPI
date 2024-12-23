<?php
// Incluir el autoload de PHPMailer (si usas Composer)
 
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php'; // Usar las clases de PHPMaileruse PHPMailer\PHPMailer\PHPMailer;use PHPMailer\PHPMailer\Exception;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
class EmailSender {
 
    // Dirección del servidor SMTP
    private $smtpHost = 'correo.invima.gov.co'; // Cambia esta dirección por la de tu servidor SMTP
 
    // Puerto del servidor SMTP
    private $smtpPort = 25; // Cambia a 465 para SSL o 587 para STARTTLS si es necesario
 
    /**
     * Envía un correo electrónico a un destinatario con opciones de copia oculta (BCC).
     *
     * @param string $to Dirección de correo del destinatario principal.
     * @param string $bcc Dirección de correo para copia oculta (opcional, puede ser null).
     * @param string $subject Asunto del correo.
     * @param string $body Contenido del correo, en formato HTML.
     */
    public function sendEmail($to, $bcc, $subject, $body) {
 
        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);
 
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();                                      // Usar SMTP
            $mail->Host = $this->smtpHost;                         // Dirección del servidor SMTP
            $mail->SMTPAuth = false;                               // Desactivar la autenticación SMTP
            $mail->SMTPSecure = false;    
            $mail->Port = $this->smtpPort;                          // Puerto SMTP (587 para STARTTLS)
 
            // Remitente y destinatario
            $mail->setFrom('permisoslaborales@invima.gov.co', 'Permisos Laborales'); // Remitente
            $mail->addAddress($to);                                 // Dirección del destinatario
 
            // Si se proporciona una dirección BCC, agregarla
            if ($bcc !== null) {
                $mail->addBCC($bcc);
            }
 
            // Asunto y cuerpo del correo
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->isHTML(true);                                    // Establecer formato HTML
 
            // Enviar el correo
            $mail->send();
            echo '
            <script>
                alert("Correo enviado exitosamente");
            </script>
            ';
        } catch (Exception $e) {
            // Manejo de errores
            echo "
            <script>
                alert('El correo no pudo ser enviado. Error de PHPMailer: " . addslashes($mail->ErrorInfo) . "');
            </script>
            ";
        }
    }
}
 

