@extends('backend.layout.tamplate')
@section('body')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table With State Save</h4>
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
                            <th>Is Featured</th>
                            <th>status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>
                                <a href="#"><i class="far fa-edit" style="color:blue;font-size:20px;margin-left:15px"></i></a>
                                <a href="#"><i class="fas fa-trash-alt"style="color:red;font-size:20px"></i></a></td>
                          </tr>
                        </tbody>
                      </table>
                 </div>
            </div>
        </div>
    </div>
</div>






@endsection