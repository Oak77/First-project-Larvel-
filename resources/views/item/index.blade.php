@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Item</div>
        <div class="card-body">
         <table class="table table-bright">
           <thead>
             <tr>
               <th scope="col">No.</th>                       
               <th scope="col">Item Name</th>                       
               <th scope="col">Subcategory Name</th>
               <th scope="col">Category Name</th>                                           
               <th scope="col">Brand Name</th>                       
               <th scope="col">Price</th>
               <th scope="col">Description</th>
               <th scope="col">Process</th>

             </tr>
           </thead>
           <tbody>
            @foreach($items as $item)
            <tr>
             <td scope="row">{{$item->id}}</td>
             <td><a href="{{ url('item/{item}') }}">
              {{$item->name}}</a></td>
              <td scope="row">{{$item->subcategory->name}}</td>
              <td scope="row">{{$item->category->name}}</td>
              <td scope="row">{{$item->brand->name}}</td>
              <td scope="row">{{$item->price}}</td>
              <td scope="row">{{$item->description}}</td>
              <td>
                <form  method="POST" action="{{ url('item/'.$item->id) }}"
                  onSubmit="if(!confirm('Are you sure?')){return false;}">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="{{ url('item/'.$item->id.'/edit') }}">
                    <button type="button" class="btn btn-warning">Edit</button>
                  </a>
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row my-auto mx-auto">
          <a href="{{ url('item/create') }}">
            <button type="button" class="btn btn-success">New</button>
          </a>
        </div>
        <div class="row offset-md-5">
          {{ $items->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
