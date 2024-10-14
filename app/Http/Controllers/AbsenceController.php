<?php

namespace App\Http\Controllers;

use App\Imports\AbsencesImport;
use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        //
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
