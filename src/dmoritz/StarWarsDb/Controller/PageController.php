<?php
/**
 * Created by PhpStorm.
 * User: dmoritz
 * Date: 06.08.14
 * Time: 11:35
 */
namespace dmoritz\StarWarsDb\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Route("/impressum", name="page_impressum")
     * @Template()
     */
    public function impressumAction()
    {
        return $this->render('StarWarsDb:Page\static:impressum.html.twig');
    }
}