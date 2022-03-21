@extends('layouts.app')

@section('title')
Productos
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Ver Productos
      <a class="btn boton float-right" href="{{ route("products.create") }}" >Crear Producto</a>
    </h3></div>
    <div class="card-body">
      <table class="table">
        <thead class="bg-warning" style="opacity: 0.8">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->pricing}}</td>
              <td>{{$item->updated_at->format('d-m-Y')}}</td>
              <td>
    
                <a href="{{ route('products.edit', $item->id) }}">Editar</a> | 

                <form method="POST" action="{{ route('products.destroy', $item->id) }}">
                  @csrf
                  @method("DELETE")

                  <button type="submit" href="{{ route('products.edit', $item->id) }}">Eliminar</button>
              </form>
                
    
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection