

@extends('layouts/layoutMaster')
@section('title', 'Applicant')
@section('vendor-style')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.scss')
@endsection
@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-chat.scss')
@endsection
@section('vendor-script')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')
@endsection
@section('page-script')
@vite('resources/assets/js/app-chat.js')
@endsection
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">New Applicants</h4>
            <input type="text" class="form-control mt-2" id="searchInput" placeholder="Search applicants..." onkeyup="searchApplicants()">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Job Position</th>
                            <th>Resume</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="applicantTable">
                        @foreach($applicants as $applicant)
                        <tr>
                            <td>{{ $applicant->firstname }}</td>
                            <td>{{ $applicant->gender }}</td>
                            <td>{{ $applicant->address }}</td>
                            <td>{{ $applicant->contact }}</td>
                            <td>{{ $applicant->email }}</td>
                            <td>{{ $applicant->jobrole }}</td>
                            <td>
                                <button class="btn btn-flat btn-sm btn-primary"><a href="http://127.0.0.1:8000/assets/img/<?php echo $applicant->resume;?>" style="color:white;">Download</a></button>
                            </td>
                            <td>
                               <?php if($applicant->applicant_status=='Pending'){?>
                                   <span class="badge bg-danger">{{ $applicant->applicant_status }}</span>
                               <?php }else if($applicant->applicant_status=='Approved'){?>
                                  <span class="badge bg-primary">{{ $applicant->applicant_status }}</span>
                              <?php }else if($applicant->applicant_status=='Reject'){?>
                                  <span class="badge bg-danger">{{ $applicant->applicant_status }}</span>
                              <?php }else if($applicant->applicant_status=='Failed'){?>
                                  <span class="badge bg-danger">{{ $applicant->applicant_status }}</span>
                              <?php }else{?>
                               <span class="badge bg-success">{{ $applicant->applicant_status }}</span>
                           <?php }?>

                       </td>
                       <td>   
                            
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ti ti-dots-vertical"></i>
                          </button>
                          <div class="dropdown-menu">

                              <form method="POST" action="{{route('applicant.reject')}}">
                                 @csrf
                                 @method('POST')
                                 <a class="dropdown-item">
                                    <input type="text" name="reject_id"  value="{{ $applicant->apply_id }}" style="display:none;">
                                    <button type="submit"  name="submit" class="btn  btn-danger btn-sm btn-flat mb-3" style="font-size:15px;">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                    Failed
                                </a>
                            </form>
                            <form method="POST" action="{{route('applicant.approved')}}">
                             @csrf
                             @method('POST')
                             <a class="dropdown-item">
                                <input type="text" name="approved_id"  value="{{ $applicant->apply_id }}" style="display:none;">
                                <button class="btn  btn-primary btn-sm btn-flat mb-3" style="font-size:15px;">
                                    <i class="fa-solid fa-user-check"></i>
                                </button>
                                Passed
                            </a>
                        </form>
                        <form method="POST" action="{{route('applicant.hired')}}">
                         @csrf
                         @method('POST')
                         <a class="dropdown-item">
                            <input type="text" name="hired_id"  value="{{ $applicant->apply_id }}" style="display:none;">
                            <button class="btn  btn-danger btn-sm btn-flat mb-3" style="font-size:15px;">
                               <i class="fa-solid fa-circle-xmark"></i>
                           </button>
                           Reject
                       </a>
                   </form>
               </div>
           </div>


       </td>
   </tr>
   @endforeach
</tbody>

</table>
</div>
<p>Showing 1-10 of  applicants</p>
</div>
</div>
</div>
<!-- JavaScript Section -->
@endsection
