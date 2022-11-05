<?php

declare(strict_types=1);

namespace Theliver\Interpreteception\Token;

final class Type
{
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function type(): string
    {
        return $this->type;
    }
}
