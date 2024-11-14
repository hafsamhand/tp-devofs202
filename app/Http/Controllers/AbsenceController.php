<?php

namespace App\Http\Controllers;

use App\Imports\AbsencesImport;
use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Absence::all()->groupBy('groupe');
        foreach ($data as $key => $group) {
            $collection = collect($group);
            $grouped = $collection->groupBy('nom');
 
            return $grouped->all();
            
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Excel::import(new AbsencesImport, 'absences.xlsx');
        $data = Absence::all()->groupBy('nom');
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'test';
    }

    /**
     * Display the specified resource.
     */
    public function show($groupe)
    {
        $data = Absence::where('groupe', strtoupper($groupe))->get()->groupBy('nom');
        $newdata = collect();
        foreach ($data as $key => $value) {
            $collection = collect($value);
            $grouped = $collection->groupBy('date_absence');
 
            $newdata->push($grouped->all()) ;
        }
        $result = DB::table('absences')
        ->select('nom', DB::raw("DATE_FORMAT(date_absence, '%Y-%m') AS month"), DB::raw('COUNT(*) AS absence_count'))
        ->where('groupe', $groupe)
        ->where('nom', '!=', 'Aucune Absence')
        ->groupBy('nom','month')
        ->orderBy('nom')
        ->get();

            //         SELECT 
            //     a.nom, 
            //     DATE_FORMAT(a.date_absence, '%Y-%m') AS month,
            //     COUNT(*) AS absence_count
            // FROM 
            //     tpdevofs202.absences a 
            // GROUP BY 
            //     1, 2
            // ORDER BY 
            //     1;
        
        // return view('absences.show', ['absences' => $result]);

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        return $absence;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
    }
}
