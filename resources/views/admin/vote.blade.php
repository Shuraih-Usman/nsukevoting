@extends('admin.main')

@section('title')
Votes |  NSUK e-Voting System
@endsection
@section('subtitle')
Votes | NSUK e-Voting System
@endsection
@section('content')



<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mt-3">
        <div class="card">
        <div class="col-12">
            <div style="display: flex;justify-content: space-between;" class="mb-0 d-flex justify-content-around mt-3">
                <h5 class="card-header"> Votes </h5>
           
            </div>
              <div id="model" data-name="votes"></div>


              <div class="table-responsive text-nowrap m-3">
                <table id="dataTable" class="table" data-filter="ALL">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Election</th>
                      <th>Candidate</th>
                      <th>User</th>
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







@endsection