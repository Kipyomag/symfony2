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
    public function listAction(Request $request)
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
        $session->getFlashBag()->add('success', 'truc');

        //redirect: redirige l'url passée en paramètre
        /*$url = $this->generateUrl('test_front_sheet', array('id' => 1));
        return $this->redirect($url);*/

        return $this->render('FrontBundle:Sheet:list.html.twig', array('sheets' => $sheets));
    }

    // rendu d'une sheet, une seule fiche et unique fiche (avec id)

    public function showAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('FrontBundle:Sheet');
        $sheet = $repository->find($id);

        if (!$sheet){
            throw new EntityNotFoundException();
        }


        return $this->render('FrontBundle:Sheet:show.html.twig', array('sheet' => $sheet));
    }

    public function createAction(Request $request)
    {
        $form = $this->createFormBuilder(new Sheet())
            ->add('name', null, array('label' => 'Nom de l\'album'))
            ->add('type')
            ->add('artist')
            ->add('duration')
            ->add('released', 'date')
            ->add('submit', 'submit')
            ->getForm();

        $form->handleRequest($request);
        if ($request->isMethod('post') && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirect($this->generateUrl('test_front_sheet_list'));
        }


        return $this->render('FrontBundle:Sheet:create.html.twig', array('form' => $form->createView()));
    }
}

