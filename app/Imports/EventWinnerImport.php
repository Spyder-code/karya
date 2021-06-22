<?php

namespace App\Imports;

use App\Models\EventWinner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EventWinnerImport implements ToModel
{
    private $id;

    public function __construct(int $id) 
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        return new EventWinner([
            'announcement_id' => $this->id,
            'name' => $row[1],
            'title' => $row[2],
            'instagram' => $row[3],
            'grade' => $row[4],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
