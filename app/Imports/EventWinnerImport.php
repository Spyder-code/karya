<?php

namespace App\Imports;

use App\Models\EventWinner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EventWinnerImport implements ToModel, WithStartRow
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
            'email' => $row[2],
            'institution' => $row[3],
            'title' => $row[4],
            'instagram' => $row[5],
            'grade' => $row[6],
            'sertif_name' => $row[7],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
