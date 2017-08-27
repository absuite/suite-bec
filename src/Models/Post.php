<?php

namespace Suite\Bec\Models;
use Closure;
use Gmf\Sys\Builder;
use Gmf\Sys\Traits\HasGuard;
use Gmf\Sys\Traits\Snapshotable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	use Snapshotable, HasGuard;
	protected $table = 'suite_bec_posts';
	public $incrementing = false;
	protected $fillable = ['id', 'ent_id', 'user_id',
		'src_id', 'src_type', 'src_type', 'type_enum', 'date', 'title', 'summary', 'content', 'avatar', 'keywords',
		'total_views', 'total_favorites', 'total_comments'];

	public static function build(Closure $callback) {
		tap(new Builder, function ($builder) use ($callback) {
			$callback($builder);

			$data = array_only($builder->toArray(), ['id', 'ent_id', 'src_id', 'src_type', 'src_type', 'type_enum', 'date',
				'title', 'summary', 'content', 'avatar', 'keywords']);

			static::create($data);
		});
	}
}
