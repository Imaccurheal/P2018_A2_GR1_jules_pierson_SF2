<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/contact")
 */
class ContactController extends Controller
{

    /**
     * Contact
     *
     * @Route("/", name="contact")
     */
    public function indexAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());

        // Get the request
        $request = $this->get('request');

        // Check the method
        if ($request->getMethod() == 'POST')
        {
            // Bind value with form
            $form->bindRequest($request);

            $data = $form->getData();

            $message = \Swift_Message::newInstance()
                ->setContentType('text/html')
                ->setSubject($data['subject'])
                ->setFrom($data['email'])
                ->setTo('blrA2GR1@yopmail.com')
                ->setBody($data['content']);

            $this->get('mailer')->send($message);

            // Launch the message flash
            $this->get('session')->setFlash('notice', 'Thanks for contact us.');
        }

        return $this->render('AppBundle:Mail:contact.html.twig',
            array(
                'form' => $form->createView(),
            ));

    }
}