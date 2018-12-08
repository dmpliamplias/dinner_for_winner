@extends('layouts.app')

@section('title')
    Produkte
@endsection

@section('content')
    <div class="container">
        @if(count($products) > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Produktname</th>
                    <th scope="col">Preis*</th>
                    <th scope="col">Kalorien*</th>
                    <th scope="col">Kohlenhydrate*</th>
                    <th scope="col">Fett*</th>
                    <th scope="col">Salz*</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr onclick="window.location = '/product/{{ $product->id }}'">
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} CHF</td>
                        <td>{{$product->calorie_amount}} kcal</td>
                        <td>{{$product->carb_amount}} g</td>
                        <td>{{$product->fat_amount}} g</td>
                        <td>{{$product->salt_amount}} g</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
            <div class="alert alert-info" role="alert">
                *Nährwertinfos & Preis pro 100g
            </div>
        @else
        <div class="alert alert-info" role="alert">
Keine Produkte erfasst
</div>
        @endif
        <a class="btn btn-primary" href="{{ route('product.create') }}" role="button">Neues Produkt hinzufügen</a>
    </div>
@endsection
