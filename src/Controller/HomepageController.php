<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
       $category = $request->request->get('categories');
       $value = $request->request->get('value');
       $valueConvert = null;

       if( !empty($value) && !empty($category)) {
          if ( $category === 'kilogramlivre') $valueConvert = $value * 2.20462;
          if ( $category === 'metreyards') $valueConvert = $value * 1.09361;
          if ( $category === 'celsusfahrenheit') $valueConvert = $value / 33.80;
       }

        return $this->render('homepage/index.html.twig', [
            'value' => $value,
            'category' => $category,
            'valueConver' => $valueConvert,
        ]);
    }
}
