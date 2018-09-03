<?php
namespace Src\Tariffs;
use Src\ExtraDriver;
use Src\GPS;
class StudentTariff extends TemplateTariff
{
    const PRICE_PER_TIME = 1;
    const PRICE_PER_DISTANCE = 4;
    use GPS, ExtraDriver;
    public function total()
    {
        if(($this->years > 21) && ($this->years < 25)) {
            return $this->standardConditions();
        } elseif ($this->years < 21) {
            return $this->studentConditions();
        } else {
            return "Тариф студенческий не доступен, когда возраст больше 25";
        }
    }
    public function standardConditions()
    {
        if ($this->gps === false) {
            return $this->sumDistanceAndPrice();
        } elseif ($this->gps === true) {
            return $this->sumDistanceAndPrice() + $this->spendTime * $this->gpsSum();
        }
    }
    public function studentConditions()
    {
        if ($this->gps === false) {
            return $this->sumDistanceAndPriceForStudents();
        } elseif ($this->gps === true) {
            return $this->sumDistanceAndPriceForStudents() + $this->spendTime * $this->gpsSum();
        }
    }
    public function sumDistanceAndPriceForStudents() {
        return ($this->sumPriceDistance() + $this->sumPriceTime()) * 1.1;
    }
    public function sumDistanceAndPrice() {
        return $this->sumPriceDistance() + $this->sumPriceTime();
    }
    public function sumPriceDistance()
    {
        return $this->spendDistance * self::PRICE_PER_DISTANCE;
    }
    public function sumPriceTime()
    {
        return $this->spendTime * self::PRICE_PER_TIME;
    }
}