<?php

namespace App\User\Application\UseCase;

use App\Core\Application\UseCase\Contract\UseCaseWithInputInterface;
use App\Core\Application\UseCase\Contract\UseCaseWithPresenterInterface;
use App\Core\DTO\Contract\DTOInterface;
use App\Core\Infrastructure\Presenter\Contract\PresenterInterface;
use App\User\DTO\UserSearchDto;
use App\User\Infrastructure\Presenter\UserPresenter;
use App\User\Infrastructure\Repository\Contract\UserRepositoryInterface;

class UserSearchUC implements UseCaseWithInputInterface, UseCaseWithPresenterInterface
{

    private UserSearchDto $dtoInput;
    private UserPresenter $presenter;

    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }
    public function execute(): void
    {
        $result = $this->repository->search($this->dtoInput);
        $this->presenter->setId($result->getId());
    }

    public function setInputDto(DTOInterface $inputDto): static
    {
        /** @var $dtoInput UserSearchDto */
        $this->dtoInput = $dtoInput;

        return $this;
    }

    public function setPresenter(PresenterInterface $presenter): static
    {
        /** @var UserPresenter $presenter */
        $this->presenter = $presenter;

        return $this;
    }
}