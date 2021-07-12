<?php

namespace App\Models\Import;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;


class ExcelImport implements ToModel, WithStartRow, WithHeadingRow, WithUpserts
{
    protected array $row;
    protected array $array;
    protected array $tableColumns;
    protected string $table;
    protected string $class;
    protected const MODELS = "App\Models\Entities\\";
    protected const ENTITY = 'entity';


    public function __construct($table)
    {
        $this->table = $table;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function checkMistakes() {
        foreach (array_filter($this->row) as $key => $value) {
            if (!in_array($key, $this->tableColumns)) {
                throw new \Exception("Table {$this->table} has no {$key} column");
            }
        }
    }

    public function model(array $row)
    {
        $this->row = $row;
        $this->getTableColumnsNames();
        $this->checkMistakes();
        $this->getTableRows();
        $this->getClassName();

       return new $this->class(array_filter($this->array));

    }

    public function uniqueBy(): string
    {
        switch ($this->table) {
            case 'products':
                $table = 'code';
                break;
            case 'production':
                $table = 'combined_code';
                break;
            case 'clients' || 'suppliers':
                $table = 'contact';
                break;
            case 'menu':
                $table = 'meal_id';
                break;
        }
        return $table;
    }

    protected function getTableRows(): void
    {
        $array = [];
        foreach ($this->tableColumns as $key => $value) {
            switch ($value) {
                case 'creator_id':
                    $array[$value] = Auth::id();
                    break;
                case 'id' | 'updater_id' | 'created_at' | 'updated_at':
                    break;
                default:
                    $array[$value] = $this->row[$value] ?? null;
            }
        }


        if($this->table == 'production')
        {
            $array['combined_code'] = $array['meal_id'] . "-" . $array['product_id'];
        }

        $this->array = $array;
    }

    protected function getTableColumnsNames(): void
    {
        $this->tableColumns = DB::getSchemaBuilder()->getColumnListing($this->table);
    }

    protected function getClassName(): void
    {
        $this->class = self::MODELS . ucfirst($this->table) . ucfirst(self::ENTITY);
    }




}
