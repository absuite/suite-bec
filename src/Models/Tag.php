<?php

namespace Suite\Bec\Models;
use Gmf\Sys\Traits\HasGuard;
use Gmf\Sys\Traits\Snapshotable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	use Snapshotable, HasGuard;
	protected $table = 'suite_bec_tags';
	public $incrementing = false;
	protected $fillable = ['id', 'ent_id', 'user_id', 'root_id', 'parent_id', 'path', 'title', 'summary', 'avatar', 'is_revoked'];
	public function root() {
		return $this->belongsTo('Suite\Bec\Models\Tag');
	}
	public function parent() {
		return $this->belongsTo('Suite\Bec\Models\Tag');
	}
}
