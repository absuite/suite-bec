<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecSubscribesTable extends Migration {
	private $mdID = "60597ca05fb811e79e9cc39423e69291";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEntity('suite.bec.subscribe')->comment('订阅')->tableName('suite_bec_subscribes');

		$md->string('id', 100)->primary();

		$md->entity('ent', 'gmf.sys.ent')->nullable()->comment('企业');
		$md->entity('user', 'gmf.sys.user')->nullable()->comment('用户');

		$md->enum('type', 'suite.bec.subscribe.type.enum')->nullable()->comment('类型');
		$md->entity('data', 'suite.bec.tag')->nullable()->comment('标签');

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
