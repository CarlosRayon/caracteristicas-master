<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{

    private  $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    /**
     * @Route("/", name="default", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/ajax_get_features", name="ajax_get_features", methods={"POST"})
     */
    public function ajaxGetFeatures(Request $request): Response
    {
        /* Solo permitimos llamada ajax */
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(
                array(
                    'status' => 'Error',
                    'message' => 'Sin permiso de acceso'
                ),
                400
            );
        }


        if ($request->isXmlHttpRequest()) {
            $requestData = $request->request->get('request');

            /* PDO básico */
            $conn = $this->entityManager->getConnection();
            $sql = "SELECT u.name, f.feature, f.feature_info FROM feature f INNER JOIN user u ON u.id = f.user_id WHERE f.feature_info LIKE :requestData";
            $stmt = $conn->prepare($sql);
            // $stmt->execute([':request' => 'azul']);
            $stmt->execute([':requestData' => "%$requestData%"]);
            $response = $stmt->fetchAllAssociative();

            return new JsonResponse($response);
        }
    }
}
