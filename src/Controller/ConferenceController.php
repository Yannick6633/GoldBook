<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ConferenceController
 * @package App\Controller
 */
class ConferenceController extends AbstractController
{

    /**
     * @var Environment
     */
    private $twig;

    /**
     * ConferenceController constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(ConferenceRepository $conferenceRepository)
    {
       return new Response($this->twig->render('conference/index.html.twig', [
            'conferences' => $conferenceRepository->findAll(),
       ]));
    }

    /**
     *@Route("/conference/{id}", name="conference")
     */
    public function show(Conference $conference, CommentRepository $commentRepository, ConferenceRepository $conferenceRepository)
    {

        //$offset = max(0, $request->query->getInt('offset', 0));
        //$paginator = $commentRepository->getCommentPaginator($conference, $offset);

        return new Response($this->twig->render('conference/show.html.twig', [
            'conferences' => $conferenceRepository->findAll(),
            'conference' => $conference,
            'comments' => $commentRepository->findBy(['conference' => $conference], ['createdAt' => 'DESC']),
            //'comments' => $paginator,
            //'previous' => $offset - CommentRepository::PAGINATOR_PER_PAGE,
            //'next' => min(count($paginator), $offset + CommentRepository::PAGINATOR_PER_PAGE)
        ]));
    }
}
