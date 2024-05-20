@extends('admin.main')

@section('title')
Candidates |  NSUK e-Voting System
@endsection
@section('subtitle')
Candidates | NSUK e-Voting System
@endsection
@section('content')



<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mt-3">
        <div class="card">
        <div class="col-12">
            <div style="display: flex;justify-content: space-between;" class="mb-0 d-flex justify-content-around mt-3">
                <h5 class="card-header"> Candidates </h5>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create">
                    Add Candidate
                  </button>
            </div>
              <div id="model" data-name="candidates"></div>


              <div class="table-responsive text-nowrap m-3">
                <table id="dataTable" class="table" data-filter="ALL">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Image </th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>gender</th>
                      <th>Team Alias</th>
                      <th>Level</th>
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Add Candidate</h5>
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
                <!-- Image Upload Section -->
                <div class="col-md-4 mb-4 col-sm-12">
                    <div class="card pb-5">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Upload Candidate Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <center>
                                        <img id="passportImagePreview" src="/assets/img/userprofile.png" width="150px" height="150px" style="border-radius:50%; box-shadow: 2px 0px 20px 8px rgba(99,99,99,0.61);
                                        -webkit-box-shadow: 2px 0px 20px 8px rgba(99,99,99,0.61);
                                        -moz-box-shadow: 2px 0px 20px 8px rgba(99,99,99,0.61); outline-style: solid; outline-color: white; outline-width: thick;" alt="">
                                    </center>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <input class="form-control" type="file" name="image" id="candidateImage" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Register Candidate Form -->
                <div class="col-md-8 mb-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Register Candidate</h5>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="fullName" placeholder="Enter Full Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <select class="form-select" name="position" id="" required>
                                            <option value="">Select Position</option>
                                            @foreach ($pos as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>  
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="sex" class="form-label">Sex</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="male" value="male" required>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="female" value="female" required>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="teamAlias" class="form-label">Team Alias</label>
                                        <input type="text" name="team" class="form-control" id="teamAlias" placeholder="Enter Team Alias">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="level" class="form-label">Level</label>
                                        <select class="form-select" name="level" id="level">
                                            <option value="">Select Level</option>
                                            <option value="100">100 Level</option>
                                            <option value="200">200 Level</option>
                                            <option value="300">300 Level</option>
                                            <option value="400">400 Level</option>
                                            <option value="500">500 Level</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
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