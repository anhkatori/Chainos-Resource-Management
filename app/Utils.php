<?php

namespace App;

use Carbon\Carbon;


class Utils
{
    public static function currentTimeStartOfDay() {
        $date = Carbon::now()->startOfDay();
        return $date;
    }
    public static function currentTimeEndOfDay() {
        $date = Carbon::now()->endOfDay();
        return $date;
    }
    public static function startOfMonthTime() {
        $date = Carbon::now()->startOfMonth();
        return $date;
    }

    public static function formatStartDateForStaff($date) {
        $dateExplode = explode(' - ', $date);
        $startDate = (isset($dateExplode[0]) && !empty($dateExplode[0])) ?
            Carbon::createFromFormat('d/m/Y', $dateExplode[0])->format('Y-m-d') :
            Utils::currentTimeStartOfDay()->format("Y-m-d");
        return $startDate;
    }
    public static function formatEndDateForStaff($date) {
        $dateExplode = explode(' - ', $date);
        $endDate = (isset($dateExplode[1]) && !empty($dateExplode[1])) ?
            Carbon::createFromFormat('d/m/Y', $dateExplode[1])->format('Y-m-d 23:59:59') :
            Utils::currentTimeEndOfDay()->format("Y-m-d 23:59:59");
        return $endDate;
    }
    public static function formatStartDateForStaffNoteThisMonth($date) {
        $dateExplode = explode(' - ', $date);
        $startDate = (isset($dateExplode[0]) && !empty($dateExplode[0])) ?
            Carbon::createFromFormat('d/m/Y', $dateExplode[0])->format('Y-m-d') :
            Utils::startOfMonthTime()->format("Y-m-d");
        return $startDate;
    }
}
