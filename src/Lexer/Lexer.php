<?php

namespace Theliver\Interpreteception\Lexer;

use Theliver\Interpreteception\Token\Token;

final class Lexer
{
    private string $input;
    private int $position;
    private int $readPosition = 0;

    // TODO: Consider better type?
    private ?string $ch = null;

    public function __construct(string $input)
    {
        $this->input = $input;
        $this->readChar();
    }

    public function nextToken(): Token
    {
        $token = null;
        switch ($this->ch) {
        case "=":
            $token = Token::ASSIGN();
            break;
        case ";":
            $token = Token::SEMICOLON();
            break;
        case "(":
            $token = Token::LPAREN();
            break;
        case ")":
            $token = Token::RPAREN();
            break;
        case ",":
            $token = Token::COMMA();
            break;
        case "+":
            $token = Token::PLUS();
            break;
        case "{":
            $token = Token::LBRACE();
            break;
        case "}":
            $token = Token::RBRACE();
            break;
        default:
            $token = Token::EOF();
        }

        $this->readChar();
        return $token;
    }

    private function readChar(): void
    {
        if ($this->readPosition >= strlen($this->input)) {
            $this->ch = null;
        } else {
            $this->ch = $this->input[$this->readPosition];
        }

        $this->position = $this->readPosition;
        $this->readPosition += 1;
    }
}
