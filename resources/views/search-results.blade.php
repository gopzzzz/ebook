<h3>Search Results for "{{ $keyword }}"</h3>

@if($products->count())
    @foreach($products as $product)
        <div class="product">
            <h5>{{ $product->name }}</h5>
            <p>{{ $product->author_name }}</p>
            <p>{{ $product->category_name }}</p>
        </div>
    @endforeach
@else
    <p>No products found.</p>
@endif