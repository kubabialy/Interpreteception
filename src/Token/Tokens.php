<?php

declare(strict_types=1);

namespace Theliver\Interpreteception\Token;

final class Tokens
{
    /**
     * @var Token[] $tokens
     */
    private array $tokens;

    private function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    public function getToken(Type $type): Token
    {
        if (!array_key_exists($type->type(), $this->tokens)) {
            throw new \Exception(sprintf("Provided Token unrecognized: ", $type->type()));
        }

        return $this->tokens[$type->type()];
    }

    public static function init(): self
    {
        $tokens = [
            "ILLEGAL" => Token::ILLEGAL(),
            "EOF" => Token::EOF(),

            // Identifier + literals
            "IDENT" => Token::IDENT(),
            "INT" => Token::INT(),

            // Operators
            "ASSIGN" => Token::ASSIGN(),
            "PLUS" => Token::PLUS(),

            // Delimiters
            "COMMA" => Token::COMMA(),
            "SEMICOLON" => Token::SEMICOLON(),

            "LPAREN" => Token::LPAREN(),
            "RPAREN" => Token::RPAREN(),

            "LBRACE" => Token::LBRACE(),
            "RBRACE" => Token::RBRACE(),

            // Keywords
            "FUNCTION" => Token::FUNC(),
            "LET" => Token::LET(),
        ];

        return new self($tokens);
    }
}
