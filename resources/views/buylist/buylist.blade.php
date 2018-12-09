<div class="container">
    <h2>Einkaufszettel</h2>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 5%">Menge</th>
            <th style="width: 10%">Einheit</th>
            <th style="width: 60%">Artikel</th>
            <th style="width: 20%">Preis</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $familyCount * 100 }}</th>
                <td>{{ $product->unit }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p><b>Total Preis: {{ $totalPrice }}</b></p>
</div>
