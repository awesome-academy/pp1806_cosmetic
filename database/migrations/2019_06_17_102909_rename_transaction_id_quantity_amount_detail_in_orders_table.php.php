<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTransactionIdQuantityAmountDetailInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'transaction_id', 'amount', 'detail')) {
                $table->renameColumn('transaction_id', 'user_id');
                $table->renameColumn('amount', 'total_price');
                $table->renameColumn('detail', 'description');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'transaction_id', 'amount', 'detail')) {
                $table->renameColumn('user_id', 'transaction_id');
                $table->renameColumn('total_price', 'amount');
                $table->renameColumn('description', 'detail');
            }
        });
    }
}
