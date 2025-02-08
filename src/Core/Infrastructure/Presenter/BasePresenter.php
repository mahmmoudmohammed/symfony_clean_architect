<?php

namespace App\Core\Infrastructure\Presenter;

use App\Core\Infrastructure\Presenter\Contract\PresenterInterface;

class BasePresenter implements PresenterInterface, \JsonSerializable
{
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
