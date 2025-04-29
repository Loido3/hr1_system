<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@extends('layouts/layoutMaster')
@section('title', 'Performance')
@section('vendor-style')
@vite([
'resources/assets/vendor/libs/jkanban/jkanban.scss',
'resources/assets/vendor/libs/select2/select2.scss',
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/quill/typography.scss',
'resources/assets/vendor/libs/quill/katex.scss',
'resources/assets/vendor/libs/quill/editor.scss'
])
@endsection

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-kanban.scss')
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/moment/moment.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/jkanban/jkanban.js',
'resources/assets/vendor/libs/quill/katex.js',
'resources/assets/vendor/libs/quill/quill.js'
])
@endsection
@section('page-script')
@vite('resources/assets/js/app-kanban.js')
@endsection
@section('content')

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Performance Management</h4>
                <button class="btn btn-flat bg-primary btn-sm   mb-3" style="font-size:15px;color:white" id="openmodal"><i class="fas fa-plus-square" id="openmodal"></i>INSERT RECORD</button>     
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search "  autocomplete="off" style="position:relative;top:-5px;">
                  <div class="input-group">
                    <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="height:30px" >
                    <div class="input-group-append">
                      <button class="btn  btn-primary" type="button" style="height:30px;font-size:15px;color:white">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>JOB POSITION</th>
                    <th>Department</th>
                    <th>TOTAL HRS WORK</th>
                    <th>TRAINING</th>
                    <th>PERFOMANCE REVIEW</th>
                    <th>Last Review Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="performanceTableBody">

                @foreach($performance as $per)
                <tr class="contents">
                    <td class="titles" >{{$per->employee_id}}</td>
                    <td  class="titles">{{$per->firstname}} {{$per->lastname}}</td>
                    <td>{{$per->jobrole}}</td>
                    <td>{{$per->dep}}</td>
                    <td>{{$per->total_hrs}}</td>
                    <td>{{$per->training}}</td>
                    <td>{{$per->Performance_Review}}</td>
                    <td>{{$per->Review_date}}</td>
                    <td style="display:none;">{{$per->Rating}}</td>
                    <td style="display:none;">{{$per->Feed_back}}</td>
                    <td style="display:none;">{{$per->performance_id}}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ti ti-dots-vertical"></i>
                          </button>
                          <div class="dropdown-menu">

                           <a class="dropdown-item">

                            <button type="button"  id="updatedata" class="btn  btn-primary btn-sm btn-flat mb-3" style="font-size:15px;">
                                <i class="fas fa-edit"></i>
                            </button>
                            Update
                        </a>

                    </div>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
</div>
</div>

<!-- Modal for Viewing Review -->
<div class="modal" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Performance Review for <span id="reviewEmployeeName"></span></h5>
            </div>
            <div class="modal-body">
                <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="database_01"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>
<div class="col-md-12" style="margin-bottom:5%;">
    <div class="form-group">
      <p>EMPLOYEE ID</p>
      <input type="text" name="" placeholder="EMPLOYEE ID  OR EMPLOYEE NAME" class="form-control">
  </div>

  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Employee ID</th>
          <th>Employee Fullname</th>
          <th>POSITION</th>
          <th>DEPARTMENT</th>
          <th>ACTION</th>
      </tr>
  </thead>
  <?php 
  $selet ="SELECT *,hr4_recruitment.department as  dep FROM `hr1_applicant_apply` INNER JOIN  hr1_applicant on  hr1_applicant.applicant_id=hr1_applicant_apply.applicant_id  INNER  JOIN  hr4_recruitment  on  hr4_recruitment.recruitment_id=hr1_applicant_apply.recruitment_id  where  hr1_applicant_apply.status='deploy'";
  $query=mysqli_query($conn,$selet);
  ?> 
  <tbody>
    <?php while($row=mysqli_fetch_assoc($query)){?>
        <tr>
            <td><?php echo  $row['applicant_id']?></td>
            <td><?php echo  $row['firstname']?> <?php echo  $row['lastname']?></td>
            <td><?php echo $row['jobrole']?></td>
            <td> <?php echo $row['dep']?></td>
            <td><button class="btn btn-primary btn-sm  btn-flat" id="add">ADD</button></td>
        </tr>
    <?php }?>
</tbody>
</table>
<form method="POST" action="{{url('performancestore')}}">
 @csrf
 @method('POST')
 <div class="row" style="margin-top:5%;">
    <div class=" col-md-6"><label>EMPLOYEE ID</label>
        <input type="text" class="form-control" id="empid"  name="empid"></div>
        <div class=" col-md-6"><label>EMPLOYEE NAME</label>
            <input type="text" class="form-control" id="fname" disabled></div>
        </div>
        <p><strong>Feedback:</strong></p>
        <textarea id="reviewFeedback" class="form-control" rows="5" placeholder="Enter feedback here..." name="feedback"></textarea>
        <div class="form-group mt-3">
            <label for="reviewRating">Rating:</label>
            <select id="reviewRating" name="rating" class="form-control">
                <option value="">Select a rating</option>
                <option ></option>
                <option >1)UnSatisfactory</option>
                <option >2)Needs  Improvement</option>
                <option >3)Meets Expectations</option>
                <option >4)Exceeds Expectations</option>
                <option >5)OutStanding</option>
            </select>
        </div>
        <div class="form-group">
            <label for="reviewRating">total Hrs:</label>
            <input type="number" name="totalhrs" class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="modalclose">Close</button>
            <button type="submit" class="btn btn-primary" >Save Review</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>





<!-- update-->
<div class="modal" id="updatemodal" tabindex="-2" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('performanceupdate')}}">
                 @csrf
                 @method('POST')
                 <div class="row" style="margin-top:5%;">
                    <input type="hidden" class="form-control"  name="performanceudpateid" id="performanceudpateid">
                    <div class=" col-md-6"><label>EMPLOYEE ID</label>
                        <input type="text" class="form-control"  name="empidupdate" id="empidupdate"></div>
                        <div class=" col-md-6"><label>EMPLOYEE NAME</label>
                            <input type="text" class="form-control" id="fnameupdate" disabled></div>
                        </div>
                        <p><strong>Feedback:</strong></p>
                        <textarea  class="form-control"  placeholder="Enter feedback here..." name="feedbackupdate" id="feedbackupdate"></textarea>
                        <div class="form-group mt-3">
                            <label for="reviewRating">Rating:</label>
                            <select name="updaterating" id="updaterating" class="form-control">
                                <option >1)UnSatiscatory</option>
                                <option >2)Needs Improvement</option>
                                <option >3)Meets Expectations</option>
                                <option >4)Exceeds Expectations</option>
                                <option >5)OutStanding</option>
                            </select>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                            <label for="reviewRating">total Hrs:</label>
                            <input type="number" name="totalhrsupdate" id="totalhrsupdate" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="reviewRating">Training:</label>
                            <select name="trainingudpate" id="trainingudpate" class="form-control">
                                <option></option>
                                <option>Complete</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="reviewRating">Performance Review:</label>
                            <select class="form-control" name="performanceudpate" id="performanceudpate">
                                <option></option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="reviewRating">Date Review:</label>
                            <input type="date" name="datereview" id="datereview" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="updatedataclose">Close</button>
                        <button type="submit" class="btn btn-primary" >Save Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Scheduling Review -->
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleModalLabel">Schedule Review for <span id="scheduleEmployeeName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="reviewDate">Select Date:</label>
                    <input type="date" id="reviewDate" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="confirmSchedule()">Confirm Schedule</button>
            </div>
        </div>
    </div>
</div>
</body>




@endsection


<script>
    $(document).on('click', '#modalclose', function () {
      $('#reviewModal').hide();
  });
    $(document).on('click', '#openmodal', function () {
      $('#reviewModal').show();
  });




    $(document).on('click', '#updatedata', function () {
      $('#updatemodal').show();
      $('form')[0].reset();
      var tr = $(this).closest("tr").find('td');
      $('#empidupdate').val(tr.eq(0).text());
      $('#fnameupdate').val(tr.eq(1).text());
      $('#feedbackupdate').val(tr.eq(9).text());
      $('#totalhrsupdate').val(tr.eq(4).text());
      $('#trainingudpate').val(tr.eq(5).text());
      $('#performanceudpate').val(tr.eq(6).text());
      $('#datereview').val(tr.eq(7).text());
      $('#performanceudpateid').val(tr.eq(10).text());

      var  f=tr.eq(8).text();
      $('#updaterating').val(f.trim()).change();
  });
    $(document).on('click', '#updatedataclose', function () {
      $('#updatemodal').hide();
  });
    $(document).on('click', '#add', function () {
       $('form')[0].reset();
       var tr = $(this).closest("tr").find('td');
       $('#empid').val(tr.eq(0).text());
       $('#fname').val(tr.eq(1).text());
       $('#fname').val(tr.eq(1).text());
   });
</script>



<script type="text/javascript">
  $(document).ready(function(){
    $('#myInput').keyup(function(){
// Search text
      var text = $(this).val();
// Hide all content class element
      $('.contents').hide();
// Search 
      $('.contents .titles:contains("'+text+'")').closest('.contents').show();
  });
});


</script>