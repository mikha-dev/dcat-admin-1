<?php

namespace Dcat\Admin\Grid\Displayers;

use D4T\Core\Contracts\D4TEnum;
use D4T\Core\Contracts\D4TEnumColored;

class EnumColoredDisplay extends AbstractDisplayer
{

    public function display()
    {

        if(is_null($this->value))
            return '';

        if(class_implements($this->value, D4TEnum::class) ) {
            /** @var D4TEnum $this->value */
            if(class_implements($this->value, D4TEnumColored::class) ) {
                $color = $this->value->color()->value;
                return '<span class="label bg-'.$color.'">'.$this->value->label().'</span>';
            }

            return $this->value->label();
        }
    }
}
