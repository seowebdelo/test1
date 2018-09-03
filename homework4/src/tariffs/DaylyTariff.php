<?php
namespace Src\Tariffs;
use Src\ExtraDriver;
use Src\GPS;
class DaylyTariff extends TemplateTariff
{
    const PRICE_PER_TIME = 1000;
    const PRICE_PER_DISTANCE = 1;
    use GPS, ExtraDriver;
    // Result with check on students
    public function total()
    {
        if($this->years > 21) {
            return $this->standardConditions();
        } else {
            return $this->studentConditions();
        }
    }
    public function standardConditions()
    {
        if (!$this->gps && !$this->extraDriver) {
            return $this->sumDistanceAndPrice();
        } elseif (($this->gps === true) && ($this->extraDriver === false)) {
            return $this->sumDistanceAndPrice() + $this->spendTime * $this->gpsSum();
        } elseif (($this->gps === false) && ($this->extraDriver === true)) {
            return $this->sumDistanceAndPrice() + $this->extraDriver();
        } elseif (($this->gps === true) && ($this->extraDriver === true)) {
            return $this->sumDistanceAndPrice() + $this->extraDriver() + ($this->spendTime * $this->gpsSum());
        }
    }
    public function studentConditions()
    {
        if (!$this->gps && !$this->extraDriver) {
            return $this->sumDistanceAndPriceForStudents();
        } elseif (($this->gps === true) && ($this->extraDriver === false)) {
            return $this->sumDistanceAndPriceForStudents() + $this->spendTime * $this->gpsSum();
        } elseif (($this->gps === false) && ($this->extraDriver === true)) {
            return $this->sumDistanceAndPriceForStudents() + $this->extraDriver();
        } elseif (($this->gps === true) && ($this->extraDriver === true)) {
            return $this->sumDistanceAndPriceForStudents() + $this->extraDriver() + ($this->spendTime * $this->gpsSum());
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
        return floor($this->spendTime/24) * self::PRICE_PER_TIME;
    }
}
