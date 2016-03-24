<?php
namespace App\PortalBundle\Entity\Manager;

use App\PortalBundle\Entity\Contact;
use App\PortalBundle\Entity\Manager\Interfaces\ContactManagerInterface;
use Symfony\Component\Translation\TranslatorInterface;

class ContactManager implements ContactManagerInterface
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var \Twig_Environment
     */
    protected $templating;

    /**
     * @var TranslatorInterface $translator
     */
    protected $translator;

    /**
     * @var array
     */
    protected $template;

    /**
     * @var string $from
     */
    protected $from;

    /**
     * @var string $from
     */
    protected $to;

    /**
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $templating
     *
     * @param $template
     * @param $from
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating, TranslatorInterface $translator, $template, $from, $to)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->template = $template;
        $this->translator = $translator;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param Contact $data
     */
    public function sendMail(Contact $data)
    {
        $message = \Swift_Message::newInstance()
            ->setCharset('UTF-8')
            ->setSubject($this->translator->trans('contact.message_subject', ['%name%' => $data]))
            ->setFrom($this->from)
            ->setTo($this->to)
            ->setBody($this->templating->render($this->template, ['data' => $data])
            )
            ->setContentType('text/html');

        $this->mailer->send($message);
    }

}
