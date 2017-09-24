<?php

namespace Suite\Bec\Http\Controllers;

use Gmf\Sys\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Suite\Bec\Models;

class PriceController extends Controller {
	public function index(Request $request) {
		$pageSize = $request->input('pageSize', 10);
		$query = Models\Price::where('is_revoked', '0');
		$query->where('ent_id', $request->oauth_ent_id);
		$query->orderBy('date', 'desc');
		$query->orderBy('created_at', 'desc');
		$data = $query->paginate($pageSize);
		return $this->toJson($data);
	}
	public function show(Request $request, string $id) {
		$query = Models\Price::where('is_revoked', '0');
		$data = $query->where('id', $id)->first();
		return $this->toJson($data);
	}
}
