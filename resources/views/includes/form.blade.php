<form action="{{ route('in_shopping_carts.store' )}}" method="post">
    @csrf
    <input type="hidden" name="product_id", value="{{$product->id}}">
    <button type="submit" class="btn boton">Agragar al carrito</button>
</form>