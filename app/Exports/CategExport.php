<?php

namespace App\Exports;

use App\Categoria;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categoria::select('nombre','orden')->withCount('productos')->get();
    }
}
