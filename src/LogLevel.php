<?php

declare(strict_types=1);

namespace NotificationFailure;

enum LogLevel: string
{
    case emergency = 'emergency';
    case alert     = 'alert';
    case critical  = 'critical';
    case error     = 'error';
    case warning   = 'warning';
    case notice    = 'notice';
    case info      = 'info';
    case debug     = 'debug';
}
