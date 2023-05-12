<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    require 'src/Exception.php';    

    // Obtener los datos del formulario
    $correo_usuario = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $nombre = $_POST['nombre'];
    $cuerpoMensaje = $_POST['especificaciones'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurar el servidor SMTP de Gmail
        $mail->SMTPDebug = 0; // No mostrar mensajes de depuración
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'spprtsicei@gmail.com'; // Reemplace con su correo electrónico de Gmail
        $mail->Password = 'tmqqzgpcpvubvfom'; // Reemplace con su contraseña de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurar los detalles del correo electrónico
        $mail->setFrom($correo_usuario);
        $mail->addAddress('spprtsicei@gmail.com'); // Reemplace con su dirección de correo electrónico de destino
        $mail->Subject = $asunto;
        $mail->Body = 'Nombre: ' . $nombre . "\n\n" . $cuerpoMensaje;

        // Enviar el correo electrónico
        $mail->send();

        header('Location: ../models/super/prestamos-supervisor.php?envio=exitoso');
        exit; // Detener la ejecución del script

    } catch (Exception $e) {
        // Mostrar un mensaje de error si no se pudo enviar el correo electrónico
        header('Location: ../models/super/prestamos-supervisor.php?envio=fallo');
        exit; // Detener la ejecución del script
    }
?>