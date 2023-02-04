<?php

class AppointmentValidator
{
    public function checkDate($date): bool
    {
        $now = time();
        $date = strtotime($date);

        return !($date < $now);
    }

    public function checkTime($time, $date): string
    {
        $now = time();
        $time = strtotime($time);
        $date = strtotime($date);

        if ($now === $date && $time < $now) {
            return 'Set correct time';
        }
        else if ($time < strtotime('09:00:00') || $time > strtotime('17:00:00')) {
            return 'Working hours of doctors (8 A.M. to 5 P.M.)';
        }
        return '';
    }

    public function checkAvailability($date, $time, $doctorSurname): bool
    {
        $appointmentsRepository = new AppointmentsRepository();
        $reserved = $appointmentsRepository->getAppointmentsByDateTimeAndDoctorSurname($doctorSurname, $date, $time);
        return !$reserved;
    }
}