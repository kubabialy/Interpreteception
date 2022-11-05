<?php

declare(strict_types=1);

namespace Theliverr\Interpreteception\Tests\Lexer;

use PHPUnit\Framework\TestCase;
use Theliver\Interpreteception\Lexer\Lexer;
use Theliver\Interpreteception\Token\Token;

class LexerTest extends TestCase
{
    public function testLexerShouldParseTokens(): void
    {
        $input = "=+(){},;";

        $tests = [
           ["token" => Token::ASSIGN(), "expected" => "="],
           ["token" => Token::PLUS(), "expected" => "+"],
           ["token" => Token::LPAREN(), "expected" => "("],
           ["token" => Token::RPAREN(), "expected" => ")"],
           ["token" => Token::LBRACE(), "expected" => "{"],
           ["token" => Token::RBRACE(), "expected" => "}"],
           ["token" => Token::COMMA(), "expected" => ","],
           ["token" => Token::SEMICOLON(), "expected" => ";"],
        ];

        $lexer = new Lexer($input);

        foreach ($tests as $test) {
            $token = $lexer->nextToken();
            $this->assertEquals(
                $token->type(),
                $test["token"]->type()
            );

            $this->assertEquals(
                $token->literal(),
                $test["expected"]
            );
        }
    }
}
