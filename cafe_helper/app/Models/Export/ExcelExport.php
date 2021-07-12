<?php


namespace App\Models\Export;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExcelExport implements FromCollection, WithHeadings
{

    protected string $table;
    protected string $class;
    protected const MODELS = "App\Models\Entities\\";
    protected const ENTITY = 'entity';

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function collection(): Collection
    {
        $this->getClassName();
        return $this->class::all();
    }

    protected function getClassName(): void
    {
        $this->class = self::MODELS . ucfirst($this->table) . ucfirst(self::ENTITY);
    }

    public function headings(): array
    {
        return DB::getSchemaBuilder()->getColumnListing($this->table);
    }

}
