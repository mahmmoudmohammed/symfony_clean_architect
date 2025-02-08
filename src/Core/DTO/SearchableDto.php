<?php

namespace App\Core\DTO;

use App\Core\DTO\Contract\DTOInterface;
use App\Core\DTO\Contract\SearchableDtoInterface;

class SearchableDto implements DTOInterface, SearchableDtoInterface
{
    private ?string $term;

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(?string $term): SearchableDto
    {
        $this->term = $term;
        return $this;
    }
    public static function getSearchableFields(): array
    {
        return ['term'];
    }
}