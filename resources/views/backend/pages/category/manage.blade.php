@extends('backend.layout.tamplate')

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
           <div class="card-header" style="display: flex; justify-content: space-between;">
            <h4>Manage All Category</h4>
            <h4><a href="{{ route('category.create') }}" class="btn btn-primary">Add category</a></h4>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#Sl.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Category / Subcategory</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                   @if ($category->image)
                                  <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="100">
                                  @else
                                   No Image
                                  @endif
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <span class="badge text-white {{ $category->is_parent ? 'bg-success' : 'bg-warning' }}">
                                        {{ $category->is_parent ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge text-white {{ $category->status ? 'bg-success' : 'bg-warning' }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}"><i class="far fa-edit" style="color:blue;font-size:20px;margin-left:15px"></i></a>
                                    <form id="deleteForm{{$category->id}}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="event.preventDefault(); confirmDelete('{{$category->id}}');">
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
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
    let formIdToDelete;
    function confirmDelete(formId) {
        formIdToDelete = formId;
        $('#deleteConfirmationModal').modal('show');
    }
    document.getElementById('confirmDelete').addEventListener('click', function() {
        document.getElementById('deleteForm' + formIdToDelete).submit();
    });
</script>

<script>
    // let formIdToDelete;
    // function confirmDelete(formId) {
    //     formIdToDelete = formId;
    //     $('#deleteConfirmationModal').modal('show');
    // }
    // document.getElementById('confirmDelete').addEventListener('click', function() {
    //     // Submit the form
    //     document.getElementById('deleteForm' + formIdToDelete).submit();
    //     iziToast.info({
    //         message: 'Delete successful',
    //         position: 'topRight'
    //     });
    // });
</script>
@endsection
