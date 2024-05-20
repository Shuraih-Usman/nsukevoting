@extends('admin.main')
@section('title')
Dashboard |  NSUK e-Voting System
@endsection
@section('subtitle')
Dashboard | NSUK e-Voting System
@endsection


@section('content')
@php
    $datetime = DB::table('election_time')->first();
    $startingdate = $datetime->start;
    $endingdate = $datetime->end;
@endphp
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mt-3">
        <!--- First Card -->
        <div class="col-md-6 mb-4">
          <div class="card shadow-md" style="background-color:#128C7E; border-radius:20px;">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <!-- Write-up on the right -->
                <div class="d-flex align-items-center gap-3">
                  <div class="card-info d-flex flex-column">
                    <h5 style="font-family:'Trajax'; font-weight:700;" class="text-white mb-1 mt-2">Total Voters</h5>
                    <h4 class="text-white mt-0 mb-2">{{$dat->voter}}</h4>
                    <h5 style="font-family:'Trajax'; font-weight:700;" class="text-white mb-1 mt-2">Verified</h5>
                    <h4 class="text-white mt-0 mb-2">{{$dat->vote}}</h4>
                  </div>
                </div>
                <!-- Icon on the left -->
                <div class="avatar">
                  <span class="avatar-initial rounded-circle" style="background-color: #ffe5e5 !important; color: #128c7e !important;"><i class="bx bx-user-voice fs-4"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--- End First Card -->
        <div class="col-md-6 mb-4">
          <div class="card" style="border-radius:20px;">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <!-- Write-up on the right -->
                <div class="d-flex align-items-center gap-3">
                  <div class="card-info d-flex flex-column">
                    <h4 class="card-title mb-1">Election Status</h4>
                    <div class="my-2">
                      <div class="countdown">
                        <span class="hours" id="hours">10</span>
                        <span class="colon">:</span>
                        <span class="minutes" id="minutes">00</span>
                        <span class="colon">:</span>
                        <span class="seconds" id="seconds">00</span>
                      </div>
                      <div class="countdown-text">Election ends in {{$endingdate}}</div>
                    </div>
                  </div>
                </div>
                <!-- Icon on the left -->
                <div class="avatar">
                  <span class="avatar-initial rounded-circle" style="background-color: #ffe5e5 !important; color: #128c7e !important;"><i class="bx bx-chart fs-4"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--- End Second Card -->
      </div>
      <div class="row">
        <!--- Third Card -->
        <div class="col-md-6 mb-4">
          <div class="card" style="border-radius:20px;">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <!-- Write-up on the right -->
                <div class="d-flex align-items-center gap-3">
                  <div class="card-info d-flex flex-column">
                    <h4 class="card-title mb-1">{{$dat->vote}}</h4>
                    <h5 class="card-title mb-1">Total Votes Cast</h5>
                    <div class="my-2">
                      <a href="{{route('votes')}}" class="btn btn-primary border-0" style="background-color:#128C7E;"><i class="bx bx-show fs-4"></i> View Details</a>
                    </div>
                  </div>
                </div>
                <!-- Icon on the left -->
                <div class="avatar">
                  <span class="avatar-initial rounded-circle" style="background-color: #ffe5e5 !important; color: #128c7e !important;"><i class="bx bx-poll fs-4"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--- End Third Card -->
        <!--- Fourth Card -->
        <div class="col-md-6 mb-4">
          <div class="card" style="border-radius:20px;">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <!-- Write-up on the right -->
                <div class="d-flex align-items-center gap-3">
                  <div class="card-info d-flex flex-column">
                    <h4 class="card-title mb-1">View Candidates</h4>
                    <h5 class="card-title mb-1">{{$dat->candidate}} Candidates</h5>
                    <div class="my-2">
                      <a href="{{route('candidate')}}" class="btn btn-primary border-0" style="background-color:#128C7E;"><i class="bx bx-user-circle fs-4"></i> View Candidates</a>
                    </div>
                  </div>
                </div>
                <!-- Icon on the left -->
                <div class="avatar">
                  <span class="avatar-initial rounded-circle" style="background-color: #ffe5e5 !important; color: #128c7e !important;"><i class="bx bx-user-pin fs-4"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--- End Fourth Card -->
      </div>

      <div class="row">
        <!--- Third Card -->
        <div class="col-md-12 mb-4">
          <div class="card" style="border-radius:20px;">
            <div class="card-body">
                    <h4 class="card-title mb-1">Set Election Start Time And End Time</h4>
                    <div class="my-2">
                        <div class="row">
                        <div class="col-md-6 col-sm-6 mt-3"> 
                            <label for="start">Election Start Date Time</label>
                            <input type="datetime-local" class="form-control" id="startdate" name="start"/> 
                        </div>
                        
                        <div class="col-md-6 col-sm-6 mt-3"> 
                            <label for="end">Election End Date Time</label>
                            <input type="datetime-local" class="form-control" id="enddate" name="end"/> 
                        </div>
                        <div class="col-md-6 col-sm-6 mt-3"> 
                      <button class="btn btn-primary border-0" id="setDATE" style="background-color:#128C7E;"> Submit</button>
                        </div>
                    </div>


                    </div>
                
            </div>
          </div>
        </div>
        <!--- End Third Card -->

      </div>
    </div>
  </div>
@endsection