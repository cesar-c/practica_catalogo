<?php

namespace App\Exports;

use App\Marca;
use Maatwebsite\Excel\Concerns\FromCollection;

class MarcaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Marca::select('nombre','abreviatura')->withCount('productos')->get();
    }
}
