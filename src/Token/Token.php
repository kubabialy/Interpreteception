<?php

namespace Theliver\Interpreteception\Token;

class Token
{
    private Type $type;

    private string $literal;

    public function __construct(Type $type, string $literal)
    {
        $this->type = $type;
        $this->literal = $literal;
    }

    public function type()
    {
        return $this->type;
    }

    public function literal()
    {
        return $this->literal;
    }

    // Token Specific Constructors
    public static function ASSIGN(): self
    {
        return new self(new Type("ASSIGN"), "=");
    }

    public static function PLUS(): self
    {
        return new self(new Type("PLUS"), "+");
    }

    public static function ILLEGAL(): self
    {
        return new self(new Type("ILLEGAL"), "ILLEGAL");
    }

    public static function EOF(): self
    {
        return new self(new Type("EOF"), "EOF");
    }

    public static function IDENT(): self
    {
        return new self(new Type("IDENT"), "IDENT");
    }

    public static function INT(): self
    {
        return new self(new Type("INT"), "INT");
    }

    public static function COMMA(): self
    {
        return new self(new Type("COMMA"), ",");
    }

    public static function SEMICOLON(): self
    {
        return new self(new Type("SEMICOLON"), ";");
    }

    public static function LPAREN(): self
    {
        return new self(new Type("LPAREN"), "(");
    }

    public static function RPAREN(): self
    {
        return new self(new Type("RPAREN"), ")");
    }

    public static function LBRACE(): self
    {
        return new self(new Type("LBRACE"), "{");
    }

    public static function RBRACE(): self
    {
        return new self(new Type("RBRACE"), "}");
    }

    public static function FUNC(): self
    {
        return new self(new Type("FUNCTION"), "FUNCTION");
    }

    public static function LET(): self
    {
        return new self(new Type("LET"), "LET");
    }
}
