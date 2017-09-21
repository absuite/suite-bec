<?php

use Gmf\Sys\Builder;
use Gmf\Sys\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BecMenuSeeder extends Seeder {
	private $sequence = '19';
	private $tag = 'e1742e00420e11e79d1897dbf903cb38';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function run() {
		$this->down();

		$exception = DB::transaction(function () {
			$id = "6267ec905d1d11e7b3e819c5846ba57f";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->root_id($id)->code('bec')->name('经营环境')
					->uri('bec')->sequence($this->sequence . '0000')->tag($this->tag);
			});
			//法规环境
			$id = "d1fb52805d1d11e7990dff290f564771";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->code('bec.statute')->name('法规环境')->parent('bec')
					->uri('bec.statute')->sequence($this->sequence . '0102')->tag($this->tag);
			});

			$id = "d1fb51505d1d11e7ab0b47c735f7b0d9";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->code('bec.statute.setting')->name('信息定制')->parent('bec.statute')
					->uri('bec.statute.setting')->sequence($this->sequence . '0104')->tag($this->tag);
			});

			$id = "d1fb51f05d1d11e7a759fb24243e686b";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->code('bec.statute.news')->name('最新消息')->parent('bec.statute')
					->uri('bec.statute.news')->sequence($this->sequence . '0106')->tag($this->tag);
			});

			$id = "6b4bbee05d5411e7b7337366f8987f19";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->code('bec.statute.query')->name('财税法规')->parent('bec.statute')
					->uri('bec.statute.query')->sequence($this->sequence . '0106')->tag($this->tag);
			});

			//法规环境
			$id = "95980aa05d5411e78e9fed4230ca6315";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->code('bec.sentiment')->name('舆情监控')->parent('bec')
					->uri('bec.sentiment')->sequence($this->sequence . '0202')->tag($this->tag);
			});

			$id = "959811605d5411e7ae7fa73ee9c2e02e";
			Menu::build(function (Builder $builder) use ($id) {
				$builder->id($id)->code('bec.sentiment.monitor')->name('舆情监控')->parent('bec.sentiment')
					->uri('bec.sentiment.monitor')->sequence($this->sequence . '0204')->tag($this->tag);
			});

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Menu::where('code', 'like', 'bec%')->delete();
	}
}
