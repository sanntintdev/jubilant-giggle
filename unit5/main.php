<?php

class Vehicle
{
    protected $brand;
    protected $model;
    protected $year;
    protected $price;

    public static $vehicleCount = 0;

    public function __construct($brand, $model, $year, $price)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
        self::$vehicleCount++;
    }

    public function displayInfo(): void
    {
        echo "Brand: $this->brand <br>";
        echo "Model: $this->model <br>";
        echo "Year: $this->year <br>";
        echo "Price: $this->price <br>";
    }

    // Compare vehicles by price
    public static function compareByPrice($v1, $v2): string
    {
        if ($v1->price > $v2->price) {
            return "First vehicle is more expensive.";
        } elseif ($v1->price < $v2->price) {
            return "Second vehicle is more expensive.";
        } else {
            return "Both vehicles have the same price.";
        }
    }
}

class Truck extends Vehicle
{
    private $cargoCapacity;

    public function __construct($brand, $model, $year, $price, $cargoCapacity)
    {
        parent::__construct($brand, $model, $year, $price);
        $this->cargoCapacity = $cargoCapacity;
    }

    public function displayInfo(): void
    {
        parent::displayInfo();
        echo "Cargo Capacity: $this->cargoCapacity tons <br><br>";
    }
}

class Motorcycle extends Vehicle
{
    private $handlebarType;

    public function __construct($brand, $model, $year, $price, $handlebarType)
    {
        parent::__construct($brand, $model, $year, $price);
        $this->handlebarType = $handlebarType;
    }

    public function displayInfo(): void
    {
        parent::displayInfo();
        echo "Handlebar Type: $this->handlebarType <br><br>";
    }
}

class Car extends Vehicle
{
    private $numberOfDoors;

    public function __construct($brand, $model, $year, $price, $numberOfDoors)
    {
        parent::__construct($brand, $model, $year, $price);
        $this->numberOfDoors = $numberOfDoors;
    }

    public function displayInfo(): void
    {
        parent::displayInfo();
        echo "Number of Doors: $this->numberOfDoors <br><br>";
    }
}

$car = new Car("Toyota", "Corolla", 2022, 20000, 4);
$truck = new Truck("Ford", "F-150", 2021, 35000, 3);
$motorcycle = new Motorcycle("Yamaha", "MT-07", 2023, 9000, "Sport");

echo "<h3>Vehicle Details</h3>";
$car->displayInfo();
$truck->displayInfo();
$motorcycle->displayInfo();

echo "Total Vehicles Created: " . Vehicle::$vehicleCount . "<br><br>";

echo Vehicle::compareByPrice($car, $truck);
