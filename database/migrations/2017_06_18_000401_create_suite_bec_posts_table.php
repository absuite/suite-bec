<?php

use Gmf\Sys\Database\Metadata;
use Illuminate\Database\Migrations\Migration;

class CreateSuiteBecPostsTable extends Migration {
	private $mdID = "cb166c705bf211e799618f7453a04de7";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$md = Metadata::create($this->mdID);
		$md->mdEntity('suite.bec.post')->comment('内容')->tableName('suite_bec_posts');

		$md->string('id', 100)->primary();

		$md->entity('ent', 'gmf.sys.ent')->nullable()->comment('企业');
		$md->entity('user', 'gmf.sys.user')->nullable()->comment('用户');

		$md->string('src_id', 100)->nullable()->comment('来源ID');
		$md->string('src_type', 200)->nullable()->comment('来源类型');

		$md->enum('type', 'suite.bec.post.type.enum')->nullable()->comment('类型');
		$md->timestamp('date')->nullable()->comment('日期');

		$md->string('title')->comment('名称');
		$md->text('summary')->nullable()->comment('摘要');
		$md->longText('content')->nullable()->comment('内容');
		$md->string('avatar')->nullable()->comment('图标');
		$md->string('keywords', 500)->nullable()->comment('关键字');

		$md->integer('total_views')->default(0)->comment('浏览数');
		$md->integer('total_favorites')->default(0)->comment('收藏数');
		$md->integer('total_comments')->default(0)->comment('评论数');

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
