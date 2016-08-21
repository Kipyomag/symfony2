<?php
namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


Class SheetController extends Controller
{

    // lister les différentes fiches
    public function sheetListAction(Request $request)
    {

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
        return $this->render('FrontBundle:Sheet:sheet.html.twig', array('id' => $id));
    }
}

