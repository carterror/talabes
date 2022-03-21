@extends('layouts.app')

@section('title')
Productos
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3>Editar Productos</h3>
    
  </div>
  <div class="card-body row justify-content-center">
      <form method="POST" action="{{ route("products.update", $product->id) }}" enctype="application/x-www-form-urlencoded">
        @csrf
        @method("PUT")
        <span class="float-right">
          <a class="" href="{{route('products.index')}}"> Regresar </a>
          <button class="btn boton " href="{{ route("products.create") }}" type="submit"> Actualizar </button>
        </span>
        <br>
        <br>
        <div class="form-group">
          <label for="title">Nombre</label>
          <input type="text" class="form-control" id="title" value="{{$product->title}}" name="title" aria-describedby="title">
          <small id="title" class="form-text text-muted">Nombre del producto</small>
        </div>
        <div class="form-group">
          <label for="pricing">Precio</label>
          <input type="number" class="form-control" id="pricing" value="{{$product->pricing}}" name="pricing" aria-describedby="precing">
        </div>
        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea name="description" class="form-control" id="" cols="80" rows="5">{{$product->description}}</textarea>

        </div>
        <div class="form-group">
          <input type="checkbox" class="form-check-input" id="public" name="public">
          <label class="form-check-label" for="public">Público</label>
        </div>
      </form>
    </div>
</div>


@endsection