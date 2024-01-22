<?php

namespace Dcat\Admin\Enums;

use Dcat\Admin\DcatEnum;
use Dcat\Admin\DcatEnumColored;
use Dcat\Admin\Traits\DcatEnumTrait;

enum TransactionType: string implements DcatEnumColored
{
    use DcatEnumTrait;

    case PAYMENT = 'PAYMENT';
    case WITHDRAW = 'WITHDRAW';
    case DEPOSIT = 'DEPOSIT';
    case REFERRAL = 'REFERRAL';
    case GIFT = 'GIFT';

    const POSITIVE_TYPES = [
        self::DEPOSIT,
        self::REFERRAL,
        self::GIFT,
    ];

    const NEGATIVE_TYPES = [
        self::PAYMENT,
        self::WITHDRAW,
    ];

    public function color(): string
    {
        return match ($this) {
            self::PAYMENT => '#1090dd',
            self::WITHDRAW => '#49d758',
            self::DEPOSIT => '#db633e',
            self::REFERRAL => '#8d3edb',
            self::GIFT => '#db3e79',
        };
    }
}
