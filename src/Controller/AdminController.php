<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{


    /**
     * @Route("/", name="index")
     */
    function indexAction(){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->redirect("new-product");
    }

    /**
     * @Route("/new-product", name="new_product")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    function newProduct(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $product = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('admin_success');
        }

        return $this->render('@admin/new_product.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/success", name="success")
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    function successAction(MailerInterface $mailer){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $email = (new Email())
            ->from('hello@example.com')
            ->to('fake@example.com')
            ->subject('New product added!')
            ->html('<p>Open page with product list!</p>');

        $mailer->send($email);
        return $this->render('@admin/product_success.html.twig');
    }
}