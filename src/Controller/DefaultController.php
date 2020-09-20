<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Intl\Currencies;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class DefaultController
 * @Route("/", name="default_site")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index_action")
     */
    function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request, TranslatorInterface $translator){

        $currency = Currencies::getName($translator->trans('currency'));
        $currency = $translator->trans($currency);

        $dql   = "SELECT p FROM App:Product p order by p.id DESC";
        $query = $em->createQuery($dql);

        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        // parameters to template
        return $this->render('index.html.twig', ['pagination' => $pagination, 'currency' =>$currency]);
    }
}