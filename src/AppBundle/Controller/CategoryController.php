<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Category;

/**
 * Category controller.
 *
 * @Route("/category")
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     * @Route("/", name="category")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();

        return $this->render('AppBundle:Category:index.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}", name="category_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->find($id);
        $articles = $em->getRepository('AppBundle:Article')->find($id);

        if (!$categories) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('AppBundle:Category:show.html.twig', [
            'category' => $categories,
        ]);
    }
}
