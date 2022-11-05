<?php

declare(strict_types=1);

namespace Theliverr\Interpreteception\Tests\Token;

use PHPUnit\Framework\TestCase;
use Theliver\Interpreteception\Token\Tokens;
use Theliver\Interpreteception\Token\Type as TokenType;

class TokenTest extends TestCase
{
    public function testShouldFindToken(): void
    {
        $tokens = Tokens::init();
        $letType = new TokenType("LET");
        $let = $tokens->getToken($letType);

        $this->assertEquals("LET", $let->literal());
        $this->assertEquals($letType, $let->type());
    }

    public function testShouldThrowIfNotFound(): void
    {
        $tokens = Tokens::init();
        $unknownType = new TokenType("UNKNOWN");

        $this->expectExceptionMessage(sprintf("Provided Token unrecognized: ", $unknownType->type()));
        $tokens->getToken($unknownType);
    }
}
