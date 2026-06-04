<?php

class Context
{

    private Strategy $strategy;

    public function __construct($strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy($strategy): void
    {
        $this->strategy = $strategy;
    }

    public function doSomething(): array
    {
        return $this->strategy->doAlgorithm([5, 1, 4, 8, 10]);
    }

}

interface Strategy
{
    public function doAlgorithm(array $data): array;
}

class StrategyA implements Strategy
{

    public function doAlgorithm(array $data): array
    {
        foreach ($data as $index => $value){
            $data[$index] = $value * 2;
        }

        return $data;
    }

}

class StrategyB implements Strategy
{

    public function doAlgorithm(array $data): array
    {
        sort($data, SORT_NUMERIC);

        return $data;
    }

}

$context = new Context(new StrategyA());
print_r($context->doSomething());
$context->setStrategy(new StrategyB());
print_r($context->doSomething());
