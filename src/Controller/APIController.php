<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class APIController extends AbstractController
{




    public function pdf():BinaryFileResponse
    {

      $pdf = new File('doc/Support_Symfony4_Part2_Jerome-AMBROISE.pdf');
      return $this->file($pdf, 'support-symfony-2', ResponseHeaderBag::DISPOSITION_INLINE );
    }



}