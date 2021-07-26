<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTimestampsOnCreate extends Migration
{

    public function up()
    {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            if($table->Tables_in_vj430144_db != 'migrations') {

                $sql = <<< SQL
                ALTER TABLE `$table->Tables_in_vj430144_db`
                    MODIFY `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    MODIFY `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
                SQL;

                DB::statement($sql);
            }
        }
    }

    public function down()
    {
        return true;
    }
}
