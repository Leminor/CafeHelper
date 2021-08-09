<div>
    <form>
        <div class=" add-input">
            <div class="row mt-2 mb-2">
                <div class="col-md-16">
                    <div class="form-group row">
                        <div class="col-md-4 order-md-1">
                            <h4>Purchase number</h4>
                        </div>
                        <div class="col-md-4 order-md-2">
                            <input type="number" class="form-control" placeholder="Add purchase #" list="suppliers"
                               wire:model="order_id">
                            @error('order_id') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-16">
                    <div class="form-group row">
                        <div class="col-md-4 order-md-1">
                            <h4>Supplier company</h4>
                        </div>
                        <div class="col-md-4 order-md-2">
                            <input type="text" class="form-control" placeholder="Search supplier..." list="suppliers"
                               wire:model="supplier_name">
                            <datalist id="suppliers">
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier['company_name']}}">
                                @endforeach
                            </datalist>
                            @error('supplier_name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <table>
                <div class="row mt-2 mb-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search products..." list="products"
                                                       wire:model="product_name.0" wire:keydown.escape="resetValue" wire:keydown.tab="resetValue">
                                                <datalist id="products">
                                                    <select>
                                                        @foreach($products as $product)
                                                            <option value="{{$product['name']}}">
                                                        @endforeach
                                                    </select>
                                                </datalist>
                                                @error('product_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="number" min="1" class="form-control" wire:model="amount.0" placeholder="Enter Amount">
                                                @error('amount.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="number" min="1" class="form-control" wire:model="price.0" placeholder="Enter Price">
                                                @error('price.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-2 mt-2">
                                            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @foreach($inputs as $key => $value)
                            <div class=" add-input">
                                <div class="row mt-2 mb-2">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Search products..." list="products"
                                                               wire:model="product_name.{{ $value }}" wire:keydown.escape="resetValue" wire:keydown.tab="resetValue">
                                                        <datalist id="products">
                                                            @foreach($products as $product)
                                                                <option value="{{$product['name']}}">
                                                            @endforeach

                                                        </datalist>
                                                        @error('product_name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="number" min="1" class="form-control" wire:model="amount.{{ $value }}" placeholder="Enter Amount">
                                                        @error('amount.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="number" min="1" class="form-control" wire:model="price.{{ $value }}" placeholder="Enter Price">
                                                        @error('price.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-2 mt-1">
                                                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </div>
                            </div>
                             @endforeach
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" wire:click.prevent="insertDB()" class="btn btn-success btn-sm">Create</button>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </form>
</div>
