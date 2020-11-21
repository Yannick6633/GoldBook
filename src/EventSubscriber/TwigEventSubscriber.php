<?php

namespace App\EventSubscriber;

use App\Repository\ConferenceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

/**
 * Class TwigEventSubscriber
 * @package App\EventSubscriber
 */
class TwigEventSubscriber implements EventSubscriberInterface
{
    /**
     * @ORM\Column(type="string")
     */
    private $twig;

    /**
     * @var ConferenceRepository
     */
    private $conferenceRepository;

    /**
     * TwigEventSubscriber constructor.
     * @param Environment $twig
     * @param ConferenceRepository $conferenceRepository
     */
    public function __construct(Environment $twig, ConferenceRepository $conferenceRepository)
    {
        $this->twig;
        $this->conferenceRepository = $conferenceRepository;
    }

    /**
     * @param ControllerEvent $event
     */
    public function onControllerEvent(ControllerEvent $event)
    {
        // ...
        $this->twig->addGlobal('conferences', $this->conferenceRepository->findAll());
    }

    /**
     * @return array|string[]
     */
    public static function getSubscribedEvents()
    {
        return [
            '* kernel.controller (Symfony\Component\HttpKernel\Event\ControllerEvent)' => 'on*KernelController(Symfony\Component\HttpKernel\Event\ControllerEvent)',
        ];
    }
}
