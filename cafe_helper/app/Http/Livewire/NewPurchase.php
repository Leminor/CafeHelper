<?php

namespace App\Http\Livewire;

use App\Models\Entities\ProductsEntity;
use App\Models\Entities\PurchasesEntity;
use App\Models\Entities\SuppliersEntity;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewPurchase extends Component
{

    public $students, $first_name, $last_name, $student_id, $product_name, $amount, $price, $supplier_name, $order_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    public $products;
    public $suppliers;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->product_name = '';
        $this->amount = '';
        $this->price = '';
        $this->supplier_name = '';
        $this->order_id = '';
    }


    public function insertDB()
    {

        foreach ($this->product_name as $key => $value) {
            $purchase = New PurchasesEntity();
            $productName = $this->product_name[$key];
            $productIdArray = ProductsEntity::query()->select('id')->where('name', '=', "$productName")->get()->toArray();
            $productId = $productIdArray['0']['id'];

            $supplierIdArray = SuppliersEntity::query()->select('id')->where('company_name', "$this->supplier_name")->get()->toArray();
            $supplierId = $supplierIdArray['0']['id'];

            $purchase->warehouse_id = 1;
            $purchase->order_id = $this->order_id;
            $purchase->supplier_id = $supplierId;
            $purchase->product_id = $productId;
            $purchase->amount = $this->amount[$key];
            $purchase->price = $this->price[$key];
            $purchase->creator_id = Auth::user()->getAuthIdentifier();
            $purchase->save();

        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Order Created Successfully.');
    }

    public function getDB()
    {
        $this->products = ProductsEntity::query()->get()->toArray();
        $this->suppliers = SuppliersEntity::query()->get()->toArray();
    }

    public function render()
    {
        $this->getDB();
        return view('livewire.new-purchase');
    }
}
