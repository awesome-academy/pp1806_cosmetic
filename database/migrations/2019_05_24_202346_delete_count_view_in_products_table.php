<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteCountViewInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'count_buy', 'view')) {
                $table->dropColumn('count_buy');
                $table->dropColumn('view');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'count_buy', 'view')) {
                $table->integer('count_buy');
                $table->integer('view');
            }
        });
    }
}
