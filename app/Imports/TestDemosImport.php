<?php

namespace App\Imports;

use App\Models\HakModels\TestDemo;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class TestDemosImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd('ddd');
        $userId = Auth::user()->id;
        $testDemos = new TestDemo([
            "code" => $row['code'],
            "name" => $row['name'],
            "local_name" => $row['local_name'],
            "description" => $row['description'],
            "status" => isset($row['status']) ? $row['status'] : 1,
            "created_by" => $userId,
            "updated_by" => $userId,
        ]);
        return $testDemos;
    }
    public function rules(): array
    {
        return [
            'code' => 'required|unique:test_demos,code',
            'name' => 'required',

            // Above is alias for as it always validates in batches
            '*.code' => 'required|unique:test_demos,code',
            '*.name' => 'required',
        ];
    }
}
