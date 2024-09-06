<?php

// Base class Vehicle
class Vehicle {
    // Core properties
    protected $make;
    protected $model;
    protected $year;

    // Constructor to initialize core properties
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to get vehicle details
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Method to describe the vehicle, can be overridden
    public function describe() {
        return "This is a vehicle.";
    }
}

// Car class extending Vehicle
class Car extends Vehicle {
    // Additional property for Car
    private $doors;

    // Constructor to initialize Car properties
    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year); // Call the parent constructor
        $this->doors = $doors;
    }

    // Overridden method to describe a car
    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

// Final class Motorcycle extending Vehicle
final class Motorcycle extends Vehicle {
    // Overridden method to describe a motorcycle
    public function describe() {
        return "This is a motorcycle.";
    }
}

// ElectricVehicle interface
interface ElectricVehicle {
    public function chargeBattery();
}

// ElectricCar class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    // Additional property for battery status
    private $batteryLevel;

    // Constructor to initialize ElectricCar properties
    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors); // Call the parent constructor
        $this->batteryLevel = $batteryLevel;
    }

    // Implementing chargeBattery method from the ElectricVehicle interface
    public function chargeBattery() {
        $this->batteryLevel = 100;
        return "The battery is fully charged.";
    }

    // Overridden method to describe an electric car
    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

// Testing the Car class
$car = new Car("Toyota", "Camry", 2015, 4);
echo $car->getDetails() . PHP_EOL; // Outputs: Make: Toyota, Model: Camry, Year: 2015
echo $car->describe() . PHP_EOL;   // Outputs: This is a car with 4 doors.

// Testing the Motorcycle class
$motorcycle = new Motorcycle("Yamaha", "Aerox V2", 2023);
echo $motorcycle->getDetails() . PHP_EOL; // Outputs: Make: Yamaha, Model: Aerox V2, Year: 2023
echo $motorcycle->describe() . PHP_EOL;   // Outputs: This is a motorcycle.

// Testing the ElectricCar class
$electricCar = new ElectricCar("Tesla", "Model Y", 2024, 4);
echo $electricCar->getDetails() . PHP_EOL; // Outputs: Make: Tesla, Model: Model Y, Year: 2024
echo $electricCar->describe() . PHP_EOL;   // Outputs: This is an electric car with 100% battery.
echo $electricCar->chargeBattery() . PHP_EOL; // Outputs: The battery is fully charged.

?>