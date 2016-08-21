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

        return $this->render('FrontBundle:Sheet:sheetList.html.twig');
    }

    // rendu d'une sheet, une seule fiche et unique fiche (avec id)

    public function sheetAction($id, Request $request)
    {
        return $this->render('FrontBundle:Sheet:sheet.html.twig', array('id' => $id));
    }
}

