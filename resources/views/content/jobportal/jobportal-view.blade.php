<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')
@section('title','PROFILE')


@section('vendor-style')
@vite([
'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/@form-validation/popular.js',
'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
'resources/assets/vendor/libs/@form-validation/auto-focus.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/pages-auth.js'
])
@endsection


<style type="text/css">

  body{
    background-color:white;
  }

</style>
@section('content')
<div class="container-xxl  " style="padding:0;">
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary  " style="padding:0px;" >
  <div class="container-fluid">
   <a class="navbar-brand" href="javascript:void(0)">JOBPORTAL</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse justify-content-center mt-3" id="navbar-ex-7">
     <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{url('/') }}" style="font-size:20px">Home</a>
      <a class="nav-item nav-link" href="{{url('/about') }} "  style="font-size:20px">About</a>
      <a class="nav-item nav-link" href="javascript:void(0) "  style="font-size:20px">Contact</a>
      <a class="nav-item nav-link" href="javascript:void(0) "  style="font-size:20px">Profile Account</a>

      <a class="nav-item nav-link" href="javascript:void(0) "  style="font-size:20px;position:relative;top:-5px;">    
      </a>
      <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  style="font-size:20px;position:relative;top:-5px;"><button class="btn btn-success" >Logout</button></a>
      <form method="POST" id="logout-form" action="{{ route('logout') }}">
        @csrf
      </form>

    </div>
  </div>
</div>
</nav> 


<div class="container-xxl flex-grow-1 container-p-y">

  <div id="content">

    <?php foreach($profiles as $prof){ ?>

      <section>
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="{{ asset('assets/img/'.$prof->image) }}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;height:150px;">
                  <h5 class="my-3"></h5>
                  <p class="text-muted mb-1"></p>
                  <p class="text-muted mb-4"></p>
                  <div class="d-flex justify-content-center mb-2">
                    <button type="button" id="open_profile" class="btn btn-primary" style="width:100%;">UPDATE PROFILE</button>
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="edit_profile">UPDATE INFO</button>
                  </div>

                       <?php $r=$prof->resume;
                    if(empty($r)){?>

                      <div class="d-flex justify-content-center mb-2">
                       
                        <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="open_resume">UPLOAD RESUME</button>
                      </div>

                    <?php }else{?>
                      <div class="d-flex justify-content-center mb-2">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init  class="btn btn-primary" style="width:100%;" id="open_resume">UPDATE RESUME</button>
                      </div>
                    <?php }


                    ?>


                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name:</p>
                    </div>
                    <div class="col-sm-9">

                      <p class="text-muted mb-0">


                       <?php echo  $prof->firstname ?>   <?php echo  $prof->middlename ?>   <?php echo  $prof->lastname ?>

                     </p>
                   </div>
                 </div>
                 <hr>
                 <div class="row ">
                  <div class="col-sm-3">
                    <p class="mb-0">Gender:</p>
                  </div>
                  <div class="col-sm-9">
                   <p class="text-muted mb-0">{{$prof->gender}}</p>
                 </div>
               </div>
               <hr>

               <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Age:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$prof->age}}</p>
                </div>
              </div>
              <hr>


              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Civil Status:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$prof->civil_status}}</p>
                </div>
              </div>
              <hr>


              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$prof->address}}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Contact:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$prof->contact}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$prof->email}}</p>
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal" tabindex="-1" role="dialog" id="login_modal">
    <div class="modal-dialog" role="document">
     <form method="POST"   action="{{route('jobportal.storeImage')}}" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" style="text-align:center;">UPLOAD PROFILE PICTURE</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Upload Profile</label>
            <input  type="file" class="form-control" name="image">
          </div>

          <input  type="text" class="form-control" name="applicant_id" value="{{$prof->applicant_id}}"style="display:none;">

          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
            <button type="button" class="btn btn-danger" id="modal_close">Close</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="profile_modal">
  <div class="modal-dialog" role="document">
   <form method="POST"   action="{{route('jobportal.storeImage')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" style="text-align:center;">PROFILE INFORMATION</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>First Name</label>
          <input  type="text" class="form-control" name="first" value="  <?php echo  $prof->firstname ?>" required>
        </div>

        <div class="form-group">
          <label>Middle Name</label>
          <input  type="text" class="form-control" name="middle" value="  <?php echo  $prof->middlename?> ">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input  type="text" class="form-control" name="last" value="  <?php echo  $prof->lastname?> ">
        </div>
        <div class="form-group">
          <label>Age</label>
          <input  type="text" class="form-control" name="age" value="<?php echo  $prof->age ?> ">
        </div>
        <div class="form-group">
          <label>Gender</label>
          <select class="form-control" name="gender" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;">
            <option>FEMALE</option>
            <option>MALE</option>

          </select>
        </div>
        <div class="form-group">
          <label>Address</label>
          <input  type="text" class="form-control" name="address" value="  <?php echo  $prof->address?> ">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input  type="email" class="form-control" name="email" value="  <?php echo  $prof->email ?> ">
        </div>
        <div class="form-group">
          <label>Contact</label>
          <input  type="number" class="form-control" name="contact" value="  <?php echo  $prof->contact ?> ">
        </div>
        <div class="form-group">
          <label>Civil Status</label>
          <select class="form-control" name="civil_status" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;">
            <option>MARRIED</option>
            <option>SINGLE</option>
          </select>
        </div>
        <input  type="text" class="form-control" name="applicant_id" value="{{$prof->applicant_id}}"style="display:none;">

        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
          <button type="button" class="btn btn-danger" id="applicant_close">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>


  <div class="modal" tabindex="-1" role="dialog" id="resume_modal">
    <div class="modal-dialog" role="document">
     <form method="POST"   action="{{url('uploadresume')}}" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" style="text-align:center;">UPLOAD RESUME</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>UPLOAD RESUME</label>
            <input  type="file" class="form-control" name="resume">
          </div>

          <input  type="text" class="form-control" name="applicant_id" value="{{$prof->applicant_id}}"style="display:none;">

          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
            <button type="button" class="btn btn-danger" id="modal_close">Close</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>



<?php }?>

</div>


</div>







<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>HR1 SYSTEM
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            LINK
          </h6>
          <p>
            <a href="#!" class="text-reset">ABOUT</a>
          </p>
          <p>
            <a href="#!" class="text-reset">CONTACT</a>
          </p>


        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>

          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>

          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i></p>
          <p>
            <i class="fas fa-envelope me-3"></i>
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/"></a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</div>
@endsection


<script >
  $(document).on('click', '#open_profile', function () {
    $('#login_modal').modal('show');
  });
  $(document).on('click', '#modal_close', function () {
    $('#login_modal').modal('hide');
  });
</script>



<script >
  $(document).on('click', '#edit_profile', function () {
    $('#profile_modal').modal('show');
  });
  $(document).on('click', '#applicant_close', function () {
    $('#profile_modal').modal('hide');
  });
</script>



<script >
  $(document).on('click', '#open_resume', function () {
    $('#resume_modal').modal('show');
  });
  $(document).on('click', '#modal_close_resume', function () {
    $('#resume_modal').modal('hide');
  });
</script>