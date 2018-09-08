<?php
namespace Src;
trait GPS
{
    public function gpsSum($spendTime) {
        return ceil($spendTime)*15;
    }
}
