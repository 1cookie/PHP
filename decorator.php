<?php
/**
 * Component
 */
abstract class Pizza
{
    protected $data;
    protected $value;

    abstract public function getData();

    abstract public function getValue();
}

/**
 * Concrete Component
 */
class BasePizza extends Pizza
{
    public function __construct()
    {
        $this->value = 10;
        $this->data = "Base Pizza:\t\${$this->value}\n";
    }

    public function getData()
    {
        return $this->data;
    }

    public function getValue()
    {
        return $this->value;
    }
}

/**
 * Decorator
 */
abstract class Decorator extends Pizza {}

/**
 * Concrete Decorator
 */
class Salami extends Decorator
{
    public function __construct(Pizza $data)
    {
        $this->value = 4;
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data->getData() . "With Salami:\t\${$this->value}\n";
    }

    public function getValue()
    {
        return $this->value + $this->data->getValue();
    }
}

/**
 * Concrete Decorator
 */
class Jalapeno extends Decorator
{
    public function __construct(Pizza $data)
    {
        $this->value = 3;
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data->getData() . "With Jalapeno:\t\${$this->value}\n";
    }

    public function getValue()
    {
        return $this->value + $this->data->getValue();
    }
}

/**
 * Userland
 */
class Client
{
    private $pizza;

    public function __construct()
    {
        $this->pizza = new BasePizza();
        $this->pizza = $this->wrapPizza($this->pizza);
    }

    private function wrapPizza(Pizza $pizza)
    {
        $pizza1 = new Salami($pizza);
        $pizza2 = new Jalapeno($pizza1);
        return $pizza2;
    }

    public function getOrder()
    {
        echo '<pre>' . $this->pizza->getData();
        echo "Total:\t\t$";
        echo $this->pizza->getValue() . '</pre>';
    }
}

$client = new Client();
$client->getOrder();

