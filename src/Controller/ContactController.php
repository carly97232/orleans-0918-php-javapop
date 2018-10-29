<?php
/**
 * Created by PhpStorm.
 * User: amelie
 * Date: 23/10/18
 * Time: 15:42
 */

namespace Controller;

use \Swift_SmtpTransport;
use \Swift_Mailer;
use \Swift_Message;

class ContactController extends AbstractController
{
    private function sendMail()
    {
        $errors = [];
        $userData = $_POST;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($userData) {
                if (empty($userData['lastName'])) {
                    $errors['lastName'] = 'Veuillez renseigner votre Nom.';
                } elseif (!preg_match("/^[a-zA-Z ]+$/", $userData['lastName'])) {
                    $errors['lastName'] = 'Veuillez remplir le champ "Nom" uniquement avec des caractères autorisés';
                }
                if (empty($userData['email'])) {
                    $errors['email'] = 'Veuillez renseigner votre E-mail.';
                } elseif (!preg_match("/^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/", $userData['email'])) {
                    $errors['email'] = 'Votre adresse email n\'est pas valide!';
                }
                if (empty($userData['message'])) {
                    $errors['message'] = 'Veuillez écrire un Message.';
                }
                if (empty($errors)) {
                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
                        ->setUsername(MAIL_USER)
                        ->setPassword(MAIL_PASSWORD)
                        ->setEncryption(MAIL_ENCRYPTION);
                    $mailer = new Swift_Mailer($transport);
                    $message = new Swift_Message();
                    $message->setSubject("Message formulaire JAVAPOP : " . $userData['subject']);
                    $message->setFrom([$userData['email'] => $userData['lastName']]);
                    $message->addTo(MAIL_USER);
                    $message->setBody("Nouveau message de " . $userData['lastName'] .
                        " (" . $userData['email'] . ") :\n"
                        . $userData['message']);
                    $result = $mailer->send($message);
                    header('Location:/contact');
                    exit();
                }
            }
        }
        return $errors;
    }

    public function index()
    {
        return $this->twig->render('Contact/index.html.twig', ['errors' => $this->sendMail()]);
    }
}
