<?php

namespace App\Core\Application\UseCase\Contract;

use App\Core\DTO\Contract\DTOInterface;

interface UseCaseWithInputInterface extends  UseCaseInterface
{
    public function setInputDto(DTOInterface $inputDto): static;
}
