@extends('layouts.app')

@section('title')
    Produkte
@endsection

@section('content')
<p>
<div class="container">
        @if(count($products) > 0)
              <ul class="list-group list-group-flush">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Produktname</th>
                          <th scope="col">Kalorien</th>
                          <th scope="col">Kohlenhydrate</th>
                          <th scope="col">Fett</th>
                          <th scope="col">Salz</th>
                          <th scope="col">Erfasst am</th>
                          <th scope="col">Geändert am</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr onclick="window.location = '/product/{{ $product->id }}'">
                          <td>{{$product->name}}</td>
                          <td>{{$product->calorie_amount}} kcal</td>
                          <td>{{$product->carb_amount}} g</td>
                          <td>{{$product->fat_amount}} g</td>
                          <td>{{$product->salt_amount}} g</td>
                          <td>{{$product->created_at}}</td>
                          <td>{{$product->updated_at}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $products->links() }}
              </ul>
              <p>
              <div class="alert alert-dark" role="alert">
                    Nährwertinfos pro 100g
              </div>
        @else
                    <p>Keine Produkte erfasst</p>
                @endif
                <p>
                  <a class="btn btn-primary" href="{{ route('product.create') }}" role="button">Neues Produkt hinzufügen</a>
            </div>
    </div>
@endsection
