<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    /**
     * @Route("/programs/", name="program_index")
     */
    public function index(): Response
    {
        // return new Response(
        //     '<html><body>Wild Series Index</body></html>'
        // );
        return $this->render('Program/index.html.twig', [
            'website' => 'Wild Series',
        ]);
    }
}
