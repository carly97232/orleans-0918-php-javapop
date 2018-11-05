<?php
/**
 * Created by PhpStorm.
 * User: amelie
 * Date: 23/10/18
 * Time: 15:42
 */

namespace Controller;

use Filter\Text;
use \Swift_SmtpTransport;
use \Swift_Mailer;
use \Swift_Message;

class ContactController extends AbstractController
{
    /**
     * @param array $userData
     * @return array
     */
    private function verifMail(array $userData): array
    {
        $errorsForm = [];
        if (empty($userData['lastName'])) {
            $errorsForm['lastName'] = 'Veuillez renseigner votre "Nom".';
        } elseif (!preg_match("#[a-zA-ZÀÁÂÃÄàáâãäÒÓÔÕÖòóôõöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ' ]$#", $userData['lastName'])) {
            $errorsForm['lastname'] = 'Veuillez remplir le champ "Nom" uniquement avec des caractères autorisés';
        }
        if (empty($userData['email'])) {
            $errorsForm['email'] = 'Veuillez renseigner votre E-mail.';
        } elseif (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $userData['email'])) {
            $errorsForm['email'] = 'Votre adresse email n\'est pas valide!';
        }
        if (empty($userData['message'])) {
            $errors['message'] = 'Veuillez écrire un Message.';
        } elseif (!preg_match(" #[a-zA-ZÀÁÂÃÄàáâãäÒÓÔÕÖòóôõöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ)(,;.?!/-:\"%' ]$# ", $userData['message'])) {
            $errorsForm['message'] = 'Veuillez écrire un Message sans caractères spéciaux.';
        }
        return $errorsForm;
    }


    /**
     * @param array $userData
     * @return string
     */
    private function sendMail(array $userData): string
    {

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

        return $result;

    }


    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(): string
    {
        $errors = $userData = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = $_POST;
            $textFilter = new Text();
            $textFilter->setTexts($userData);
            $userData = $textFilter->filter();
            $errors = $this->verifMail($userData);
            if (empty($errors)) {
                $this->sendMail($userData);
                header('location:/contact');
                exit();
            }
        }
        return $this->twig->render('Contact/index.html.twig', ['errors' => $errors, 'post' => $userData]);

    }

}
