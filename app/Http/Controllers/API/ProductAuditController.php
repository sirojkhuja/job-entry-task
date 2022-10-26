<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductAudit;
use Illuminate\Http\Request;

class ProductAuditController extends Controller
{
    public function __invoke(Request $request)
    {
        $productChangesWithFilter = ProductAudit::getWithFilter($request->query('from'), $request->query('to'));

        if (count($productChangesWithFilter) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Product history of changes were fetched successfully!!!',
                'data' => $productChangesWithFilter
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Records was not found',
                'data' => []
            ]);
        }

    }
}
