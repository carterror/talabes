<form action="{{ route('in_shopping_carts.store' )}}" method="post">
    @csrf
    <div class="product__details__quantity">
        <div class="quantity">
            <div class="pro-qty">
                <input type="text" name="cantidad" value="1">
            </div>
        </div>
    </div>
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="btn boton">Agragar al carrito</button>
</form>