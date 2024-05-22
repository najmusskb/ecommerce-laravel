@extends('backend.layout.tamplate')

@section('body')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="card-header">
                    <h4>Edit Brand</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
                    </div>
                    <div class="form-group mb-0">
                        <label>Brand Description</label>
                        <textarea class="form-control" name="description">{{ $brand->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Is Featured</label>
                        <select class="form-control" name="is_featured">
                            <option value="0" {{ $brand->is_featured == 0 ? 'selected' : '' }}>Not Featured</option>
                            <option value="1" {{ $brand->is_featured == 1 ? 'selected' : '' }}>Yes Featured</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label>Brand Image / Logo</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
