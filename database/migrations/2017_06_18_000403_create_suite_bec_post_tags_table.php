<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecPostTagsTable extends Migration {
	public $mdID = "cb166f405bf211e7975965e9b986d30b";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEntity('suite.bec.post.tag')->comment('内容标签')->tableName('suite_bec_post_tags');

		$md->string('id', 100)->primary();
		$md->entity('post', 'suite.bec.post')->nullable()->comment('内容');
		$md->entity('tag', 'suite.bec.tag')->nullable()->comment('标签');
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
