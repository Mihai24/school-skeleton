<?php
namespace School\Validator;

class ValidatorCollection implements \Iterator, \Countable
{
    private array $validators;

    public function __construct(array $validators)
    {
        $this->validators = $validators;
    }

    public function addValidator(ValidatorInterface $validator): self
    {
        array_push($this->validators, $validator);

        return new ValidatorCollection($this->validators);
    }

    public function removeValidator(ValidatorInterface $validator): self
    {
        foreach ($this->validators as $checkValidator)
        {
            if ($checkValidator === $validator)
            {
                unset($validator, $this->validators);
            }
        }

        return new ValidatorCollection($this->validators);
    }

    public function current()
    {
        return $this->current($this->validators);
    }

    public function next(): void
    {
        $this->next($this->validators);
    }

    public function key()
    {
        return $this->key($this->validators);
    }

    public function valid(): bool
    {
        return $this->valid($this->validators);
    }

    public function rewind(): void
    {
        $this->rewind($this->validators);
    }

    public function count(): int
    {
        return count($this->validators);
    }
}