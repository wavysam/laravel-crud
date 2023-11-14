<x-boilerplate title="Laravel Crud">

    <h1 class="mb-3">Product Lists</h1>
    <a href="{{ route("create.page") }}" class="btn btn-success mb-3">Add New Product</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ date("M d, Y", strtotime($product->created_at)) }}</td>
                        <td class="d-flex">
                            <a href="{{ route("update.page", ["id" => $product->id]) }}" class="btn btn-sm btn-primary me-2">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route("product.delete", ["id" => $product->id]) }}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</x-boilerplate>
