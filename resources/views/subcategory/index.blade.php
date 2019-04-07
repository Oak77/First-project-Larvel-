@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Subcategory</div>
        <div class="card-body">
         <table class="table table-bright">
           <thead>
             <tr>
               <th scope="col">No.</th>                        
               <th scope="col">Subcategory Name</th>
               <th scope="col">Category Name</th>
               <th scope="col">Process</th>
             </tr>
           </thead>
           <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
             <td scope="row">{{$subcategory->id}}</td>
             <td><a href="{{ url('subcategory/{subcategory}') }}">
              {{$subcategory->name}}</a></td>
              <td scope="row">{{$subcategory->category->name}}</td>
              <td>
                <form  method="POST" action="{{ url('subcategory/'.$subcategory->id) }}"
                  onSubmit="if(!confirm('Are you sure?')){return false;}">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="{{ url('subcategory/'.$subcategory->id.'/edit') }}">
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
          <a href="{{ url('subcategory/create') }}">
            <button type="button" class="btn btn-success">New</button>
          </a>
        </div>
        <div class="row offset-md-5">
          {{ $subcategories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
