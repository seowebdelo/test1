<?php
interface Calc
{
    public function count($km, $hours, $min, $age = false);
}
abstract class A_Tariff implements Calc
{
    protected $pricePerKilometer;
    protected $pricePerMinute;
}
class Base extends A_Tariff
{
    public function __construct()
    {
        $this->pricePerMinute = 3;
        $this->pricePerKilometer = 10;
    }
    public function count($km, $hours, $min, $age = true){
        if (($age >= 18) && ($age < 21)) {
            $k = 1.1;
        } else {
            $k = 1;
        }
        $tripPrice = ($this->pricePerKilometer * $km+ $this->pricePerMinute * ($hours * 60 + $min))*$k;
        return $tripPrice;
    }
}
class Hours extends A_Tariff
{
    public function __construct()
    {
        $this->pricePerMinute = 200/60;
        $this->pricePerKilometer = 0;
    }
    public function count($km, $hours, $min, $age = true){
        if (($age >= 18) && ($age < 21)) {
            $k = 1.1;
        } else {
            $k = 1;
        }
        $tripPrice = ($this->pricePerKilometer * $km+ $this->pricePerMinute * ($hours * 60 + $min))*$k;
        return $tripPrice;
    }
}
class Days extends A_Tariff
{
    public function __construct()
    {
        $this->pricePerMinute = 1000/1440;
        $this->pricePerKilometer = 1;
    }
    public function count($km, $hours, $min, $age = true){
        if (($age >= 18) && ($age < 21)) {
            $k = 1.1;
        } else {
            $k = 1;
        }
        $tripPrice = ($this->pricePerKilometer * $km+ $this->pricePerMinute * ($hours * 60 + $min))*$k;
        return $tripPrice;
    }
}
class Student extends A_Tariff
{
    public function __construct()
    {
        $this->pricePerMinute = 1;
        $this->pricePerKilometer = 4;
    }
    public function count($km, $hours, $min, $age = true){
        if ($age <= 25) {
            $k = 1;
        } else {
            echo "Водитель не подходит для пакета Студенческий";
        }
        $tripPrice = ($this->pricePerKilometer * $km+ $this->pricePerMinute * ($hours * 60 + $min))*$k;
        return $tripPrice;
    }
}
$trip = new Base();
echo $trip->count(100, 6, 30, 19);
echo "<br/>";
$trip2 = new Hours();
echo $trip2->count(100, 6, 30, 19);
echo "<br/>";
$trip3 = new Days();
echo $trip3->count(100, 6, 30, 19);
echo "<br/>";
$trip4 = new Student();
echo $trip4->count(100, 6, 30, 19);
echo "<br/>";
