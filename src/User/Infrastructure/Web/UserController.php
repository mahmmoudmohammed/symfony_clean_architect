<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Web;

use App\User\Application\UseCase\UserSearchUC;
use App\User\DTO\UserSearchDto;
use App\User\Infrastructure\Presenter\UserPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

#[Route('users/')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly Serializer $serializer,
    )
    {
    }

    /**
     * @throws \Exception
     * @throws ExceptionInterface
     */
    #[Route(path: '/listing', methods: ['post'])]
    public function list(UserSearchUC $searchUC, Request $request): Response
    {
        $inputDto = $this->serializer->denormalize($request->getContent(), UserSearchDto::class, 'json');
        $presenter = new UserPresenter();
        $searchUC
            ->setInputDto($inputDto)
            ->setPresenter($presenter)
            ->execute();

        return new JsonResponse($presenter, Response::HTTP_OK);
    }
}
