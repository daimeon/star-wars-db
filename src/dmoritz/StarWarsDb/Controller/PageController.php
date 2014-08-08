<?php
/**
 * Created by PhpStorm.
 * User: dmoritz
 * Date: 06.08.14
 * Time: 11:35
 */
namespace dmoritz\StarWarsDb\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dmoritz\StarWarsDb\Entity\Contact;

class PageController extends Controller
{
    /**
     * @Route("/impressum", name="page_impressum")
     * @Template()
     */
    public function impressumAction()
    {
        return $this->render('StarWarsDb:Page\static:impressum.html.twig');
    }

    /**
     * displays as well as processes contact page.
     *
     * @Route("/contact", name="page_contact")
     * @Template("dmoritzStarWarsDb:Page:contact.html.twig")
     */
    public function contactAction()
    {
        // creating the contact entity and the form
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        // if request is post, validate form and send mail
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $this->sendEmail($contact);
            }
        }

        // pass the generated form in the variable $form to the
        // template defined by the @Template annotation
        return array('form' => $form->createView());
    }

    /**
     * @param Contact $contact
     * @return type 1 (true) if send successfully, 0 (false) otherwise
     */
    private function sendEmail($contact) {
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact from example.com')
            ->setFrom('contact@example.com')
            ->setTo('yourmail@example.com')
            ->setBody($this->renderView('YourIdentifierYourBundle:Page:email.txt.twig', array('contact' => $contact)))
        ;
        return $this->get('mailer')->send($message);
    }
}