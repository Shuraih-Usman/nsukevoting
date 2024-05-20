@extends('admin.main')

@section('title')
Positions |  NSUK e-Voting System
@endsection
@section('subtitle')
Positions | NSUK e-Voting System
@endsection
@section('content')



<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mt-3">
        <div class="card">
        <div class="col-12">
            <div style="display: flex;justify-content: space-between;" class="mb-0 d-flex justify-content-around mt-3">
                <h5 class="card-header"> Positions </h5>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create">
                    Add Position
                  </button>
            </div>
              <div id="model" data-name="positions"></div>


              <div class="table-responsive text-nowrap m-3">
                <table id="dataTable" class="table" data-filter="ALL">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                </table>
              </div>

        </div>

        
    </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Add Election</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <form class="" method="post"  id="modaddform">
          @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <label for="name">Election Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Election Name"/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Submit</button>
          <input type="hidden" name="action" value="add"> 
         </div>
        </form>
      </div>
    </div>
  </div>






@endsection