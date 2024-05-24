@extends('backend.layout.tamplate')

@section('body')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="form-group mb-0">
                        <label>Category Description</label>
                        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Category / sub Category</label>
                        <select class="form-control" name="is_parent">
                            <option value="0" {{ $category->is_featured == 0 ? 'selected' : '' }}>Not Featured</option>
                            <option value="1" {{ $category->is_featured == 1 ? 'selected' : '' }}>Yes Featured</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label>Category Image / Logo</label>
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