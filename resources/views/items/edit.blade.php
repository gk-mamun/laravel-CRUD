@include('includes.header')
        <h3 class="text-center m-3">Update item</h3>
        
        <div class="container-fluid">
            <div class="card" style="max-width: 600px; margin: auto">
                <form action="/items/edit/{{ $item->id }}" method="POST" enctype="multipart/form-data" class="card-body" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name}}" placeholder="Enter Item's Name">
                    </div>
                    <div class="form-group">
                        <label>Item Code</label>
                        <input type="text" name="code" class="form-control" value="{{ $item->code }}" placeholder="Enter Item's Code">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $item->price }}" placeholder="Enter Item's Price">
                    </div>
                    <div class="form-group">
                        <label>Item Image</label>
                        <input type="file" name="item_image" class="form-control"  value="{{ $item->image }}">
                    </div>
                    <div class="form-group">
                        <label>Item Stock</label>
                        <input type="number" name="stock" class="form-control"  value="{{ $item->stock }}"  placeholder="Enter Item's Stock">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="/items" class="btn btn-default">Go Back</a>
                </form>
            </div>
            
        </div>


        <script src="/js/app.js"></script>
    </body>
</html>
