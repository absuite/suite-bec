<?php

use Gmf\Sys\Builder;
use Gmf\Sys\Models\LnsItem;
use Illuminate\Database\Seeder;
use Suite\Bec\Models\Post;

class BecLnsItemPreSeeder extends Seeder {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function run() {
		LnsItem::build(function (Builder $b) {
			$b->type(Post::class)->code('bec')->name('环境数据量');
		});
	}

}
