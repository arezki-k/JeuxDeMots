<?php

namespace App\Controller;

use App\Entity\Relation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function populateRelationTableFromJson(){
        $entityManager = $this->getDoctrine()->getManager();
        $jsondata = file_get_contents('relations.json');
        $data = json_decode($jsondata, true);

        foreach($data as $item) {
            $entity = new Relation();
            $entity->setIdRelation($item['id']);
            $entity->setName($item['name']);
            $entity->setDescription($item['description']);
            $entity->setWeight(0);

            $entityManager->persist($entity);
        }
        $entityManager->flush();
    }

    /**
     * @Route("/", name="home")
     * TODO relations get 20 best relations
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $relations = $entityManager->getRepository(Relation::class)->findAll();
        // database empty, populate it
        if(!$relations) {
            $this->populateRelationTableFromJson();
        }
        // fetch relations from DB.
        $relations = $entityManager->getRepository(Relation::class)->findAll();
        return $this->render('home/index.html.twig', [
            'title' => 'Bienvenue',
            'relations' => $relations]);
    }
}
