<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecTagsTable extends Migration {
	public $mdID = "cb1669c05bf211e78b5c33d16578dfc5";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEntity('suite.bec.tag')->comment('标签')->tableName('suite_bec_tags');

		$md->string('id', 100)->primary();

		$md->entity('ent', 'gmf.sys.ent')->nullable()->comment('企业');
		$md->entity('user', 'gmf.sys.user')->nullable()->comment('用户');

		$md->entity('root', 'suite.bec.tag')->nullable()->comment('根标签');
		$md->entity('parent', 'suite.bec.tag')->nullable()->comment('上级');
		$md->string('path')->nullable()->comment('路径');

		$md->string('title')->comment('名称');
		$md->text('summary')->nullable()->comment('摘要');
		$md->string('avatar')->nullable()->comment('图标');
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
