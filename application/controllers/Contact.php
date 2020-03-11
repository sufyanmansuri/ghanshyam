<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('cart_model');
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(isset($isLoggedIn) || $isLoggedIn == TRUE){
            $data1['getCartCount'] = $this->cart_model->getCartCount();
            $this->load->view('header',$data1);
        }else{
            $this->load->view('header');
        }
        $this->load->view('contact');
        $this->load->view('footer');

    }
    public function sendMessage()
    {

        if (isset($_POST['name']))
            $name = $_POST['name'];
        if (isset($_POST['cemail']))
            $email = $_POST['cemail'];
        if (isset($_POST['message']))
            $message = $_POST['message'];
        if (isset($_POST['subject']))
            $subject = $_POST['subject'];

        $content = "From: $name \n Email: $email \n Message: $message";
        $recipient = "youremail@here.com";
        $mailheader = "From: $email \r\n";
        // Load Composer's autoloader
        require 'vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'sufyan8834@gmail.com';                     // SMTP username
            $mail->Password   = 'Samajhmeinaayakya?';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('sufyan8834@gmail.com', 'Mailer');
            $mail->addAddress('sufyan8834@gmail.com');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($email, $name);
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->AltBody = $content;

            $mail->send();
            $status = "send";
            setFlashData($status, "Message sent successfully!");
            redirect('Contact');
        } catch (Exception $e) {
            $status = "notsend";
            setFlashData($status, "Message not sent, try again.");
            redirect('Contact');
        }
    }
}
