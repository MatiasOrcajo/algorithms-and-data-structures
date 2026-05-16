<?php

interface Beverage {
    public function getDescription(): string;
    public function cost(): float;
}

class Espresso implements Beverage {
    public function getDescription(): string {
        return "Espresso";
    }

    public function cost(): float {
        return 2.50;
    }
}

class Mocca implements Beverage {
    public function getDescription(): string {
        return "Mocca";
    }

    public function cost(): float {
        return 3;
    }
}

abstract class CondimentDecorator implements Beverage {
    protected Beverage $beverage;

    public function __construct(Beverage $beverage) {
        $this->beverage = $beverage;
    }
}

class Milk extends CondimentDecorator {
    public function getDescription(): string {
        return $this->beverage->getDescription() . ", Milk";
    }

    public function cost(): float {
        return $this->beverage->cost() + 0.30;
    }
}

class Sugar extends CondimentDecorator {
    public function getDescription(): string {
        return $this->beverage->getDescription() . ", Sugar";
    }

    public function cost(): float {
        return $this->beverage->cost() + 0.20;
    }
}

class Cream extends CondimentDecorator {
    public function getDescription(): string {
        return $this->beverage->getDescription() . ", Cream";
    }

    public function cost(): float {
        return $this->beverage->cost() + 0.50;
    }
}


$beverage = new Espresso();

$beverage = new Milk($beverage);

$beverage = new Sugar($beverage);
echo $beverage->getDescription() . " $" . $beverage->cost() . "\n";
$beverage = new Cream($beverage);
echo $beverage->getDescription() . " $" . $beverage->cost() . "\n";

$beverage2 = new Sugar(new Milk(new Mocca()));
echo $beverage2->getDescription() . " $" . $beverage2->cost() . "\n";


