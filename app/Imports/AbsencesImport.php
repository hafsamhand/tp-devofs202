<?php

namespace App\Imports;

use App\Models\Absence;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsencesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absence([
            'nom' => $row['absence'],
            'date_absence' => Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])),
            'groupe' => $row['groupe'],
            'motif' => $row['commentaire'],
        ]);
    }
}
