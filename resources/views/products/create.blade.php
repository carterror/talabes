@extends('layouts.app')

@section('title')
Productos
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Crear Productos</h3>
      
    </div>
    <div class="card-body row justify-content-center">
        <form method="POST" action="{{ route("products.store") }}" enctype="application/x-www-form-urlencoded">
          @csrf
          <span class="float-right">
            <a class="" href="{{route('products.index')}}"> Regresar </a>
            <button class="btn boton " href="{{ route("products.create") }}" type="submit"> Guardar </button>
          </span>
          <br>
          <br>
          <div class="form-group">
            <label for="title">Nombre</label>
            <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title" aria-describedby="title">
            <small id="title" class="form-text text-muted">Nombre del producto</small>
          </div>
          <div class="form-group">
            <label for="title">Foto</label>
            <input type="text" class="form-control" id="photo" value="{{old('photo')}}" name="photo" aria-describedby="title">
            <small id="title" class="form-text text-muted">Dirección de la foto</small>
          </div>
          <div class="form-group">
            <label for="pricing">Precio</label>
            <input type="number" class="form-control" id="pricing" value="{{old('pricing')}}" name="pricing" aria-describedby="precing">
          </div>
          <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" class="form-control" id="description" cols="80" rows="5">{{old('description')}}</textarea>

          </div>
          <div class="form-group">
            <input type="checkbox" class="form-check-input" id="public" name="public" checked>
            <label class="form-check-label" for="public">Público</label>
            <br>
            <input type="checkbox" class="form-check-input" id="cup" name="cup">
            <label class="form-check-label" for="cup">CUP</label>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection