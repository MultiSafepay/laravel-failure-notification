<?php

declare(strict_types=1);

namespace NotificationFailure;

use CastModels\Model as CastModel;

class Model extends CastModel
{
    public LogLevel $logLevel;
    public string $problem;
    /**
     * @var array<string, string> $data
     */
    public array $data;
}
