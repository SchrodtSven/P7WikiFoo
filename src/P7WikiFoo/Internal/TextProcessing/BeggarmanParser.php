<?php

namespace SchrodtSven\P7WikiFoo\Internal\TextProcessing;

class BeggarmanParser
{
    private array $find;

    private array $repl;

    private string $plHo = '{{%s}}';

    public function __construct(private string $tpl)
    {
        
    }

    public function __set(string $name, mixed $value): void
    {
        $this->find[] = sprintf($this->plHo, $name);
        $this->repl[] = $value;
    }

    public function set(string $name, mixed $value): self
    {
        $this->find[] = sprintf($this->plHo, $name);
        $this->repl[] = $value;
        return $this;
    }

    public function render(): string
    {
        return str_replace($this->find, $this->repl, $this->tpl);
    }
}