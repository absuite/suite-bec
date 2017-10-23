<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecPricesTable extends Migration {
	public $mdID = "ced36aa07cda11e7b217c9a3dc50836f";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEntity('suite.bec.price')->comment('价格')->tableName('suite_bec_prices');

		$md->string('id', 100)->primary();

		$md->entity('ent', 'gmf.sys.ent')->nullable()->comment('企业');

		$md->string('src_id', 100)->nullable()->comment('来源ID');
		$md->string('src_type', 200)->nullable()->comment('来源类型');
		$md->string('src_title', 200)->nullable()->comment('来源');

		$md->timestamp('date')->nullable()->comment('日期');

		$md->string('title')->comment('名称');
		$md->decimal('price', 30, 2)->default(0)->comment('价格');
		$md->decimal('price_purchase', 30, 2)->default(0)->comment('采购价格');
		$md->decimal('price_sale', 30, 2)->default(0)->comment('销售价格');
		$md->boolean('is_revoked')->default(0)->comment('撤销');
		$md->timestamps();

		$md->build();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Metadata::dropIfExists($this->mdID);
	}
}
