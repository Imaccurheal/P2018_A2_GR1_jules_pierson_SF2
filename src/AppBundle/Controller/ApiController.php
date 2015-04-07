<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class ApiController
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/article/{id}", name="api_article", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function articleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var ArticleRepository $repo */
        $repo = $em->getRepository('AppBundle:Article');
        $articles = $repo->findArticleForApi($id);

        return new JsonResponse($articles);
    }

    /**
     * @Route("/category/{id}", name="api_category", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var CategoryRepository $repo */
        $repo = $em->getRepository('AppBundle:Category');
        $categories = $repo->findCategoryForApi($id);

        return new JsonResponse($categories);
    }

    /**
     * @Route("/tag/{id}", name="api_tag", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function tagAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var TagRepository $repo */
        $repo = $em->getRepository('AppBundle:Tag');
        $tags = $repo->findTagForApi($id);

        return new JsonResponse($tags);
    }

    /**
     * @Route("/user/{id}", name="api_user", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function userAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var UserRepository $repo */
        $repo = $em->getRepository('AppBundle:User');
        $users = $repo->findUserForApi($id);

        return new JsonResponse($users);
    }
}