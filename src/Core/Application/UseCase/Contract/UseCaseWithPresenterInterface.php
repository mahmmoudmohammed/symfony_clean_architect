<?php

namespace App\Core\Application\UseCase\Contract;


use App\Core\Infrastructure\Presenter\Contract\PresenterInterface;

interface UseCaseWithPresenterInterface extends  UseCaseInterface
{
    public function setPresenter(PresenterInterface $presenter): static;
}
