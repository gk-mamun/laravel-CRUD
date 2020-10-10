@include('includes.header')
        
        <div class="container-fluid">
            <div class="card" style="max-width: 600px; margin: auto">
                <img class="card-img-top" src="/storage/item_images/{{ $item->image }}" alt="{{ $item->name }}">
                <div class="card-body">
                    <h1 class="card-title">{{ $item->name }}</h1>
                    <p>Price: {{ $item->price }}</p>
                    <p>Available Stock: {{ $item->stock }}</p>
                    <a href="/items" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>

