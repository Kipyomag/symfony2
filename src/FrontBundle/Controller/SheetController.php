<?php
namespace FrontBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FrontBundle\Entity\Sheet;

Class SheetController extends Controller
{

    // lister les différentes fiches
    public function sheetListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('FrontBundle:Sheet');

        $sheets = $repository->getAll();



        /*$sheet = new Sheet();1
        $sheet->setName('MTV New York');
        $sheet->setType('CD Audio');
        $sheet->setArtist('Nirvana');
        $sheet->setDuration('53:30');
        $sheet->setReleased(new \DateTime(null));

        $em->persist($sheet);
        $em->flush();*/

        $session = $this->get('session');
        $session->set('machin', 'plop');
        $session->getFlashBag()->add('machin', 'truc');

        //redirect: redirige l'url passée en paramètre
        /*$url = $this->generateUrl('test_front_sheet', array('id' => 1));
        return $this->redirect($url);*/

        return $this->render('FrontBundle:Sheet:sheetList.html.twig');
    }

    // rendu d'une sheet, une seule fiche et unique fiche (avec id)

    public function sheetAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('FrontBundle:Sheet');
        $sheet = $repository->find($id);

        if (!$sheet){
            throw new EntityNotFoundException();
        }


        return $this->render('FrontBundle:Sheet:sheet.html.twig', array('sheet' => $sheet));
    }
}

