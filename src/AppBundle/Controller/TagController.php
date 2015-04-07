<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Tag;

/**
 * Tag controller.
 *
 * @Route("/tag")
 */
class TagController extends Controller
{

    /**
     * Lists all Tag entities.
     *
     * @Route("/", name="tag")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();

        return $this->render('AppBundle:Tag:index.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Finds and displays a Tag entity.
     *
     * @Route("/{id}", name="tag_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tag = $em->getRepository('AppBundle:Tag')->find($id);

        if (!$tag) {
            throw $this->createNotFoundException('Unable to find Tag entity.');
        }

        return $this->render('AppBundle:Tag:show.html.twig', [
            'tag' => $tag,
        ]);
    }
}
