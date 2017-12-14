<?php

namespace Suite\Bec\Models;
use Closure;
use Gmf\Sys\Builder;
use Gmf\Sys\Traits\HasGuard;
use Gmf\Sys\Traits\Snapshotable;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model {
	use Snapshotable, HasGuard;
	protected $table = 'suite_bec_areas';
	public $incrementing = false;
	protected $fillable = ['id','atme_id', 'name'];

	public static function build(Closure $callback) {
		tap(new Builder, function ($builder) use ($callback) {
			$callback($builder);
			$data = array_only($builder->toArray(), ['id','atme_id', 'name']);
			static::create($data);
		});
	}
}
