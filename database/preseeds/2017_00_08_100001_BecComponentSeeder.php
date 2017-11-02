<?php

use Gmf\Sys\Builder;
use Gmf\Sys\Models;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BecComponentSeeder extends Seeder {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function run() {
		$exception = DB::transaction(function () {
			Models\Component::build(function (Builder $builder) {
				$builder->code('becStatuteSetting')->name('信息定制');
			});
			Models\Component::build(function (Builder $builder) {
				$builder->code('becStatuteNews')->name('最新信息');
			});
			Models\Component::build(function (Builder $builder) {
				$builder->code('becStatuteQuery')->name('财税法规');
			});
		});
	}

}
