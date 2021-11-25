<?php

namespace App\Controller;

use App\Entity\Personnes;
use App\Entity\Sports;
use App\Form\PersonneType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function addPersonne( Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $personne = new Personnes();
        $orignalSports = new ArrayCollection();
        foreach ($personne->getSports() as $sports) {
            $orignalSports->add($sports);
        }
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        if($form->isSubmitted()){
          foreach ($orignalSports as $sports) {
            if ($personne->getSports()->contains($sports) === false) {
                $em->remove($sports);
            }
        }
          $em->persist($personne);
          $em->flush();
        }
  return $this->render('personne.html.twig', [
    'form' => $form->createView()
  ]);
    
    }
}
