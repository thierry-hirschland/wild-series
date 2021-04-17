<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Program;

/**
 * @Route("/categories", name="category_")
 */
class CategoryController extends AbstractController
{
    /**
     * Show all rows from Category's entity
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render(
            'Category/index.html.twig',
            [
            'categories' => $categories]
        );
    }

    /**
     * @Route("/show/{id<\d+>}", methods={"GET"}, name="show")
     */
    public function show(int $id): Response
    {
        $programs = $this->getDoctrine()->getRepository(Program::class)->findBy(['category' => $id]);
        $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy(['id' => $id]);
        // if (!$programs) {
        //     throw $this->createNotFoundException(
        //         'No program found with this category id : '.$id.' in program\'s table.'
        //     );
        // }
        return $this->render('Category/show.html.twig', [
            'programs' => $programs,
            'category' => $category,
        ]);
    }
}
