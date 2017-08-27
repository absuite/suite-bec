<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecPostTypeEnum extends Migration {
	private $mdID = "cb1658e05bf211e79d7ce7c4eb1f009f";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEnum('suite.bec.post.type.enum')->comment('分享类型');
		$md->string('news')->comment('资讯')->default(2);
		$md->string('knowledge')->comment('知识')->default(1);
		$md->string('statute')->comment('法规')->default(2);
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
