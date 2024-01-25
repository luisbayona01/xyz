<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'factura';

    /**
     * Run the migrations.
     * @table factura
     *
     * @return void
     */
    public function up()
    {
      Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('id_cliente')->nullable()->default(null)->unsigned();
            $table->date('fecha')->nullable()->default(null);
            $table->integer('cantidad')->nullable()->default(null);
            $table->decimal('impuesto', 8, 2)->nullable()->default(null);
            $table->unsignedInteger('id_producto')->nullable()->default(null)->unsigned();
            $table->string('subtotal', 45)->nullable()->default(null);

            $table->index(["id_cliente"], 'id_cliente_idx');

            $table->index(["id_producto"], 'id_producto_idx');


            $table->foreign('id_cliente', 'id_cliente_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_producto', 'id_producto_idx')
                ->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
