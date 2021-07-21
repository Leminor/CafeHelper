<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entities\RealizationsEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class RealizationsController extends Controller
{
    public function all()
    {
//        return RealizationsEntity::all();
        return RealizationsEntity::query()->with('creator')->get();
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required',
            'client_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'warehouse_id' => 'required',
            'description' => 'max:255',
        ]);

        $realization = new RealizationsEntity();
        $realization->order_id = $validated['order_id'];
        $realization->client_id = $validated['client_id'];
        $realization->product_id = $validated['product_id'];
        $realization->amount = $validated['amount'];
        $realization->price = $validated['price'];
        $realization->warehouse_id = $validated['warehouse_id'];
        $realization->description = $validated['description'];
        $realization->creator_id = Auth::user()->getAuthIdentifier();

        $realization->save();
        return $realization;
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'order_id' => 'required',
            'client_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'warehouse_id' => 'required',
            'description' => 'max:255',
        ]);

        /** @var RealizationsEntity $realization */

        $realization = RealizationsEntity::query()->where(['id' => $id])->first();

        $realization->order_id = $validated['order_id'];
        $realization->client_id = $validated['client_id'];
        $realization->product_id = $validated['product_id'];
        $realization->amount = $validated['amount'];
        $realization->price = $validated['price'];
        $realization->warehouse_id = $validated['warehouse_id'];
        $realization->description = $validated['description'];
        $realization->creator_id = Auth::user()->getAuthIdentifier();

        $realization->save();
        return $realization;
    }

    public function delete(int $id): RealizationsEntity
    {
        /** @var RealizationsEntity|null $realization */
        $realization = RealizationsEntity::query()->where(['id' => $id])->first();
        if (!$realization) {
            throw new RuntimeException("Realization #{$id} is undefined");
        }

        $realization->delete();
        return $realization;

    }
}
