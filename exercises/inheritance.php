<?php
// Write a php class called Animal with a method called makeSound(). Create a subclass called Cat that overrides the makeSound() method to bark.

class Animal
{
    public function makeSound()
    {
        echo "woof!";
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        echo "meow!";
    }
}


// Write a php class called Vehicle with a method called drive(). Create a subclass called Car that overrides the drive() method to print "Repairing a car".

class Vehicle
{
    public function drive()
    {
        echo "Driving a vehicle";
    }
}

class Car extends Vehicle
{
    public function drive()
    {
        echo "Repairing a car";
    }
}




// Write a php class called Shape with a method called getArea(). Create a subclass called Rectangle that overrides the getArea() method to calculate the area of a rectangle.

class Shape
{
    public function getArea()
    {
        echo "Calculating the area of a shape";
    }
}

class Rectangle extends Shape
{
    public function getArea()
    {
        echo "Calculating the area of a rectangle";
    }
}


// Write a php class called Employee with methods called work() and getSalary(). Create a subclass called HRManager that overrides the work() method and adds a new method called addEmployee().

class Employee
{
    public function work()
    {
        echo "Working on a project";
    }

    public function getSalary()
    {
    }
}

class HRManager extends Employee
{
    public function work()
    {
        echo "managing employees";
    }

    //can the previous method work add a new method called addEmployee()?

    public function addEmployee()
    {
        echo "Adding an employee";
    }
}


// Write a php class known as "BankAccount" with methods called deposit() and withdraw(). Create a subclass called SavingsAccount that overrides the withdraw() method to prevent withdrawals if the account balance falls below one hundred.
class BankAccount
{
    protected $balance;
    public function deposit()
    {

    }

    public function withdraw()
    {

    }
}

class SavingsAccount extends BankAccount
{
    public function withdraw()
    {
        if ($this->balance < 100) {
            echo "Cannot withdraw";
        } else {
            echo "Withdrawing";
        }
    }
}


// Write a php class called Animal with a method named move(). Create a subclass called Cheetah that overrides the move() method to run.

class Animal2
{
    public function move()
    {
        echo "Moving";
    }
}

class Cheetah extends Animal2
{
    public function move()
    {
        echo "Running";
    }
}

// Write a php class known as Person with methods called getFirstName() and getLastName(). Create a subclass called Employee that adds a new method named getEmployeeId() and overrides the getLastName() method to include the employee's job title.

class Person
{
    public function getFirstName()
    {
        echo "Doe";
    }

    public function getLastName(){

    }
}

class Employee2 extends Person{

    public function getEmployeeId(){

    }

    public function getLastName(){
        echo "Engineer";
    }
}


// Write a php class called Shape with methods called getPerimeter() and getArea(). Create a subclass called Circle that overrides the getPerimeter() and getArea() methods to calculate the area and perimeter of a circle.



// Write a php vehicle class hierarchy. The base class should be Vehicle, with subclasses Truck, Car and Motorcycle. Each subclass should have properties such as make, model, year, and fuel type. Implement methods for calculating fuel efficiency, distance traveled, and maximum speed.

class Vehicle2
{

}

// Write a php class hierarchy for employees of a company. The base class should be Employee, with subclasses Manager, Developer, and Programmer. Each subclass should have properties such as name, address, salary, and job title. Implement methods for calculating bonuses, generating performance reports, and managing projects.
