<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecSubscribeTypeEnum extends Migration {
	public $mdID = "58345bd05fb811e7a3fc2ffae138caf2";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEnum('suite.bec.subscribe.type.enum')->comment('订阅类型');
		$md->string('industry')->comment('行业')->default(1);
		$md->string('area')->comment('地域')->default(2);
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
