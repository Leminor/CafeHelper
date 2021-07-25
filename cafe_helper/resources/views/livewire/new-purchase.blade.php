<div>
    <form>
        <div class=" add-input">
            <div class="row mt-2 mb-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Add purchase #" list="suppliers"
                               wire:model="order_id" wire:keydown.escape="resetValue" wire:keydown.tab="resetValue">
                        <datalist id="suppliers">
                            <select>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier['company_name']}}">
                                    @endforeach

                            </select>
                        </datalist>
                        @error('first_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search supplier..." list="suppliers"
                               wire:model="supplier_name" wire:keydown.escape="resetValue" wire:keydown.tab="resetValue">
                        <datalist id="suppliers">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier['company_name']}}">
                                    @endforeach
                        </datalist>
                        @error('first_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-4">
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
                        @error('first_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="number" min="1" class="form-control" wire:model="amount.0" placeholder="Enter Amount">
                        @error('last_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="number" min="1" class="form-control" wire:model="price.0" placeholder="Enter Price">
                        @error('last_name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-2 mt-1">
                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                </div>
            </div>
        </div>

        @foreach($inputs as $key => $value)
            <div class=" add-input">
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search products..." list="products"
                                   wire:model="product_name.{{ $value }}" wire:keydown.escape="resetValue" wire:keydown.tab="resetValue">
                            <datalist id="products">
                                    @foreach($products as $product)
                                        <option value="{{$product['name']}}">
                                    @endforeach

                            </datalist>
                            @error('first_name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" min="1" class="form-control" wire:model="amount.{{ $value }}" placeholder="Enter Amount">
                            @error('amount.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" min="1" class="form-control" wire:model="price.{{ $value }}" placeholder="Enter Price">
                            @error('price.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2 mt-1">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">
                <button type="button" wire:click.prevent="insertDB()" class="btn btn-success btn-sm">Create</button>
            </div>
        </div>
    </form>
</div>
