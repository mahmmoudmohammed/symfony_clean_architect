<?php

namespace App\User\Application\UseCase;

use App\Core\Application\UseCase\Contract\UseCaseWithInputInterface;
use App\Core\Application\UseCase\Contract\UseCaseWithPresenterInterface;
use App\Core\DTO\Contract\DTOInterface;
use App\Core\Infrastructure\Presenter\Contract\PresenterInterface;
use App\User\Domain\Model\User;
use App\User\DTO\UserSearchDto;
use App\User\Infrastructure\Presenter\UserPresenter;
use App\User\Infrastructure\Repository\Contract\UserRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;

class UserSearchUC implements UseCaseWithInputInterface, UseCaseWithPresenterInterface
{

    private UserSearchDto $dtoInput;
    private UserPresenter $presenter;

    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }
    public function execute(): void
    {
        $users = $this->repository->search($this->dtoInput);
        $results = new ArrayCollection();
        foreach ($users as $index => $user) {
            assert($user instanceof User);
            $results->add($this->presenter->createFromUser($user));
        }
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