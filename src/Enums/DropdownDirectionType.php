<?php

namespace Dcat\Admin\Enums;

use D4T\Core\Contracts\D4TEnum;
use D4T\Core\Traits\D4TEnumTrait;

enum DropdownDirectionType : string implements D4TEnum
{
    use D4TEnumTrait;

    case DOWN = 'down';
    case UP = 'up';
    case START = 'start';
    case END = 'end';
}
