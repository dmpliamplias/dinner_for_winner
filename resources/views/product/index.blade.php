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
                          <th scope="col">Kalorien**</th>
                          <th scope="col">Kohlenhydrate*</th>
                          <th scope="col">Fett*</th>
                          <th scope="col">Salz*</th>
                          <th scope="col">Bearbeiten</th>
                          <th scope="col">Erfasst am</th>
                          <th scope="col">Geändert am</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr>
                          <td>{{$product->name}}</td>
                          <td>{{$product->calorie_amount}}</td>
                          <td>{{$product->carb_amount}}</td>
                          <td>{{$product->fat_amount}}</td>
                          <td>{{$product->salt_amount}}</td>
                          <td>
                            <a href="{{ URL::route('product.show', $product->id) }}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Bearbeiten</a>
                          </td>
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
                    <p>*in Gramm pro Portion (100g)</p>
                    <p>**in kcal pro 100g</p>
              </div>
        @else
                    <p>Keine Produkte erfasst</p>
                @endif
                <p>
                  <a class="btn-primary" href="{{ route('product.create') }}">Neues Produkt hinzufügen</a>
            </div>
    </div>
@endsection
