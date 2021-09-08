<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class TaskExport implements FromQuery,WithHeadings
{

    use Exportable;

    public function __construct($from, $to, $id)
    {
        $this->from = $from;
        $this->to = $to;
        $this->id = $id;
    }
    public function query()
    {
        return Task::query()->whereDate('created_at', '>=', $this->from)
                              ->whereDate('created_at', '<=', $this->to)
                              ->where('portfolio', '=', $this->id);
    }

    public function headings(): array {

        return [
            'Id',
            'Task Description',
            'Portfolio Number',
            'Client Number',
            'Plot Number',
            'Document Type',
            'Due Date',
        ];
    }
}
