<?php
namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


Class SheetController extends Controller
{

    // lister les différentes fiches
    public function sheetListAction()
    {

    }

    // rendu d'une sheet, une seule fiche et unique fiche (avec id)

    public function sheetAction($id)
    {
        return new Response("ok");
    }
}

