@include('includes.header')
        <h1 class="text-center m-5">Laravel CRUD Application</h1>
        
        <div class="container-fluid">
        <!-- Alert Message -->
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <a href="/items/create" class="btn btn-success mb-3">Add Item</a>
        <!-- Items Table -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Stock</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    @php
                        $number = 0;    
                    @endphp
                    @foreach ( $items as $item )
                        @php 
                            $number++;
                        @endphp
                        <tr>
                            <th scope="row">{{ $number }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td><strong>$ {{ $item->price }}</strong></td>
                            <td><img src="/storage/item_images/{{ $item->image }}" width="60px"></td>
                            <td>{{ $item->stock }} pcs</td>
                            <td class="text-center">
                                <a href="/items/{{ $item->id }}" class="btn btn-primary btn-sm">View</a>
                                <a href="/items/edit/{{ $item->id }}" class="btn btn-warning btn-sm">Update</a>
                                <a href="/items/delete/{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

