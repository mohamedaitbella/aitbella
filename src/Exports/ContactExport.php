<?php

namespace Aitbella\Cosmed\Exports;

use Aitbella\Cosmed\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::all();
    }
}
