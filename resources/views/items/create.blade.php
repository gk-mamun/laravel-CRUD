@include('includes.header')
        <h3 class="text-center m-3">Create a new item</h3>
        
        <div class="container-fluid">
            <form action="/items" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Item Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Item's Name">
                </div>
                <div class="form-group">
                    <label>Item Code</label>
                    <input type="text" name="code" class="form-control" placeholder="Enter Item's Code">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter Item's Price">
                </div>
                <div class="form-group">
                    <label>Item Image</label>
                    <input type="file" name="item_image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Item Stock</label>
                    <input type="number" name="stock" class="form-control"  placeholder="Enter Item's Stock">
                </div>
                <input type="submit" class="btn btn-primary" value="Add">
            </form>
        </div>


        <script src="/js/app.js"></script>
    </body>
</html>
