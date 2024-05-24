@extends('backend.layout.tamplate')

@section('body')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Create New Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-0">
                        <label>Category Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>

                  <div class="form-group">
                        <label>Category / Subcategory</label>
                        <select class="form-control" name="is_parent">
                            <option value="0">Please Select the Parent Category if any</option>
                            @foreach(App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $pcat)
                                <option value="{{ $pcat->id }}">{{ $pcat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="0">Please Select the Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                     <div class="form-group mb-0">
                    <label>Category Image / Logo</label>
                    <input type="file" name="image" class="form-control-file">
               </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
