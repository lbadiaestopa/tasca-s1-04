<?php

    class Employee {

        private $name;
        private $salary;

        public function __construct($name, $salary) {
            $this->name = $name;
            $this->setSalary($salary);
        }

        public function hasToPayTaxes() {
            if ($this->salary > 6000) {
                return "Name: " . $this->name . " has to pay taxes.";
            } else {
            return "Name: " . $this->name . " does not have to pay taxes.";
            }
        }

        private function setSalary($salary) {
        if ($salary < 0) {
            throw new InvalidArgumentException("Salary cannot be negative");
        }
        $this->salary = $salary;
        }
    }

?>