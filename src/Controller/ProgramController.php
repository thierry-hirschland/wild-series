<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;

/**
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * Show all rows from Program's entity
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        // $var = $this->getDoctrine();
        // $var2 = $var->getRepository(Program::class);
        // var_dump($var2);
        // die();
        $programs = $this->getDoctrine()->getRepository(Program::class)->findAll();

        return $this->render(
            'Program/index.html.twig',
            [
            'programs' => $programs]
        );
    }

    /**
     * @Route("/show/{id<\d+>}", methods={"GET"}, name="show")
     */
    public function show(int $id): Response
    {
        $program = $this->getDoctrine()->getRepository(Program::class)->findOneBy(['id' => $id]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
        return $this->render('Program/show.html.twig', [
            'program' => $program,
        ]);
    }
}
