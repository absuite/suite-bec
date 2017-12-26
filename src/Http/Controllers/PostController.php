<?php

namespace Suite\Bec\Http\Controllers;

use GAuth;
use Gmf\Sys\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Suite\Bec\Models;

class PostController extends Controller {
	public function index(Request $request) {
		$pageSize = $request->input('pageSize', 5);
		$query = Models\Post::where('is_revoked', '0');
		$query->where('ent_id', GAuth::entId());
		$query->orderBy('date', 'desc');
		$query->orderBy('created_at', 'desc');
		if ($request->has('type') && $request->input('type')) {
			$query->where('type_enum', $request->input('type'));
		}
		$data = $query->paginate($pageSize);
		return $this->toJson($data);
	}
	public function show(Request $request, string $id) {
		$query = Models\Post::where('is_revoked', '0');
		$data = $query->where('id', $id)->first();
		return $this->toJson($data);
	}
}
