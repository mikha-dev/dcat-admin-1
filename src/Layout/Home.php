<?php

namespace Dcat\Admin\Layout;

use Closure;

class Home
{

    protected ?Closure $builder = null;

    public function withBuilder(Closure $builder) : static {

        $this->builder = $builder;

        return $this;
    }

    public function render(Content $content) : Content {
        $this->builder && call_user_func($this->builder, $content);

        return $content;
    }
}
