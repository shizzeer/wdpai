<?php

require_once __DIR__.'/../models/Medical.php';

class MedicalsController
{
    public function getMedicalsList(string $medicals): array
    {
        $medicalsList = explode("\n", $medicals);
        $medicalsObjectsList = array();
        foreach ($medicalsList as $medicalStr) {
            if (!empty($medicalStr)) {
                $medicalsObjectsList[] = new Medical($medicalStr);
            }
        }
        return $medicalsObjectsList;
    }

    public function castMedicalsListToString(array $medicals): string
    {
        $medicalsAsStr = '';
        foreach ($medicals as $medical) {
            $medicalsAsStr = $medicalsAsStr."\n".$medical['name'];
        }
        return $medicalsAsStr;
    }
}