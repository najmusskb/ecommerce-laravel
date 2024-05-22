@extends('backend.layout.tamplate')

@section('body')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Create New Brands</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-0">
                        <label>Brand Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Is Featured</label>
                        <select class="form-control" name="is_featured">
                            <option value="0">Please Select the Featured Status</option>
                            <option value="1">Yes Featured</option>
                            <option value="0">Not Featured</option>
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
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
