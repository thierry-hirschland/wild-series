<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;
use App\Entity\Season;
use App\Entity\Episode;

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
    public function show(Program $program): Response
    {
        // $program = $this->getDoctrine()->getRepository(Program::class)->findOneBy(['id' => $id]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$program->getId().' found in program\'s table.'
            );
        }
        return $this->render('Program/show.html.twig', [
            'program' => $program,
        ]);
    }

    /**
     * @Route("/{program<\d+>}/season/{season}", name="season_show")
     */
    public function showSeason(Program $program, Season $season): Response
    {
        // $program = $this->getDoctrine()->getRepository(Program::class)->findOneBy(['id' => $programId]);
        // $season = $this->getDoctrine()->getRepository(Season::class)->findOneBy(['id' => $seasonId]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$program->getId().' found in program\'s table.'
            );
        }
        if (!$season) {
            throw $this->createNotFoundException(
                'No season with id : '.$season->getId().' found in season\'s table.'
            );
        }
        return $this->render('Program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
        ]);
    }

    /**
     * @Route("/{program}/season/{season}/episode{episode}", name="episode_show")
     */
    public function showEpisode(Program $program, Season $season, Episode $episode): Response
    {
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$program->getId().' found in program\'s table.'
            );
        }
        if (!$season) {
            throw $this->createNotFoundException(
                'No season with id : '.$season->getId().' found in season\'s table.'
            );
        }
        if (!$episode) {
            throw $this->createNotFoundException(
                'No episode with id : '.$episode->getId().' found in episode\'s table.'
            );
        }
        return $this->render('Program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode,
        ]);
    }
}
