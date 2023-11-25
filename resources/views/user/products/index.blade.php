@extends('layouts.app')

@section('content')
    <h1>This is products Page</h1>  
  <a href="products/create" 
    class="btn btn-primary"
    role="button">
      Create a new products
  </a>
  
  @foreach ($products as $products)
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
    <div class="fw-bold">
      <a href="/products/{{ $products->id }}">
        {{-- Like "show details" --}}
        {{ $products->name }}
      </a>      
    </div>
    {{ $products->description }}
    </div>
    <span class="badge bg-primary rounded-pill">
        {{ $products->price }}
    </span>
    <a href="products/{{ $products->id }}/edit">
        Edit
    </a>
    {{-- Delete a food --}}
    <form action="/products/{{ $products->id }}" method="post">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger">
        Delete
      </button>
    </form>
  </li>
  @endforeach
</ol>
@endsection