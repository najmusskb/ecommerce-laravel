@extends('backend.layout.tamplate')

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Manage Brands</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#Sl.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Is Featured</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                   @if ($brand->image)
                                  <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" width="100">
                                  @else
                                   No Image
                                  @endif
                                </td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->description }}</td>
                                <td>{{ $brand->is_featured ? 'Yes' : 'No' }}</td>
                                <td>{{ $brand->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('brand.edit', $brand->id) }}"><i class="far fa-edit" style="color:blue;font-size:20px;margin-left:15px"></i></a>
<form id="deleteForm{{$brand->id}}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <a href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{$brand->id}}').submit();">
        <i class="fas fa-trash-alt" style="color:red;font-size:20px"></i>
    </a>
</form>
</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
