<?php

use Gmf\Sys\Builder;
use Illuminate\Database\Seeder;
use Suite\Bec\Models;

class BecPriceSeeder extends Seeder {
	public $entId = '';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		if (empty($this->entId)) {
			$this->entId = config('gmf.ent.id');
		}
		if (empty($this->entId)) {
			return;
		}
		if (Models\Price::where('ent_id', $this->entId)->count()) {
			return;
		}
		Models\Price::where('ent_id', $this->entId)->delete();

		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("3.0mm热轧板卷Q235")->price("4250");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("4.75mm热轧板卷Q235")->price("4220");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("1.0mm冷轧板卷SPCC")->price("4720");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("普8mm")->price("4280");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("普20mm")->price("3930");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("低合金20mm")->price("4150");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("螺纹钢20mmHRB400E")->price("4110");});

		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("盘螺8 HRB400")->price("4310");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("高线8mmHPB300")->price("4240");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("50*5 角钢")->price("4320");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("16# 槽钢")->price("4150");});
		Models\Price::build(function (Builder $b) {$b->ent_id($this->entId)->title("25# 工字钢")->price("4080");});

	}
}
