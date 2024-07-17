<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChunkExport implements FromCollection, WithHeadings
{
    protected $contacts;

    public function __construct($contacts)
    {
        $this->contacts = $contacts;
    }

    public function export()
    {
        return collect($this->contacts);
    }
    public function headings(): array
    {
        // Implement if you need headings
        return [];
    }

}
