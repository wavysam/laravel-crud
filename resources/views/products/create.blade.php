<x-boilerplate title="Laravel Crud - Create">
    <h1>Add new product</h1>

    <div class="w-50">
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ old("name") }}" type="text" class="form-control" id="name" name="name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input value="{{ old("quantity") }}" type="text" class="form-control" id="quantity" name="quantity">
                @error('quantity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input value="{{ old("price") }}" type="text" class="form-control" id="price" name="price">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route("home.page") }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>

</x-boilerplate>
