<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Asset\Construction;

class UpdateGeometryColumnInConstrucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('construcions', function (Blueprint $table) {
        //     $table->update(['geometry' => DB::raw("ST_GeomFromText('POINT(' || longitude || ' ' || latitude || ')')")]);
        // });
        Construction::query()->update(['geom' => DB::raw("ST_GeomFromText('POINT(' || longitude || ' ' || latitude || ')')")]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('construcions', function (Blueprint $table) {
        //     $table->update([
        //         'geom' => null
        //     ]);
        // });
        Construction::query()->update([
            'geom' => null
        ]);
    }
}