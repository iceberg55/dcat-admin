<?php

namespace Dcat\Admin\Enums;

use Dcat\Admin\DcatEnum;
use Dcat\Admin\DcatEnumColored;
use Dcat\Admin\Traits\DcatEnumTrait;

enum TransactionStatus: string implements DcatEnumColored
{
    use DcatEnumTrait;

    case PENDING = 'PENDING';
    case SUCCESS = 'SUCCESS';
    case FAILED = 'FAILED';

    const STATUSES = [
        self::PENDING,
        self::SUCCESS,
        self::FAILED,
    ];

    public function color(): string
    {
        return match ($this) {
            self::PENDING => '#dd9710',
            self::SUCCESS => '#49d758',
            self::FAILED => '#db633e',
        };
    }
}
