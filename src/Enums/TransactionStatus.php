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
    case REJECTED = 'REJECTED';

    const STATUSES = [
        'PENDING',
        'SUCCESS',
        'REJECTED',
    ];

    public function color(): string
    {
        return match ($this) {
            self::PENDING => '#dd9710',
            self::SUCCESS => '#49d758',
            self::REJECTED => '#db633e',
        };
    }
}
