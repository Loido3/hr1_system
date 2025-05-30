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


    <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="database_01"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">SOCIAL RECOGNITION</h4>    
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search "  autocomplete="off" style="position:relative;top:-5px;">
              <div class="input-group">
                <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="height:30px" >
                <div class="input-group-append">
                  <button class="btn " type="button" style="height:30px;background-color:#0f234d;font-size:15px;color:white">
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
                <th>PERFOMANCE REVIEW</th>
                <th>RATING</th>
                <th>FEED BACK</th>
                <th>DATE</th>
                <th>ACTION</th>   
            </tr>
        </thead>
        <tbody id="performanceTableBody">
         @foreach($social as $social)
         <tr class="contents">
            <td class="titles">{{ $social->employee_id }}</td>
            <td class="titles">{{ $social->firstname }} {{ $social->lastname }}</td>

            <td>{{ $social->Performance_Review }}</td>
            <td>{{ $social->Rating }}</td>
            <td>{{ $social->Feed_back }}</td>
            <td>{{ $social->created_at }}</td>
            <td><div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
               <a class="dropdown-item">
                <button class="btn  btn-primary btn-sm btn-flat mb-3" style="font-size:15px;" id="recognitionopen">
                  <i class="fa-solid fa-award" id="recognitionopen"></i>
              </button>
              Give Recognition
          </a>
          <a class="dropdown-item">
            <button class="btn  btn-primary btn-sm btn-flat mb-3" style="font-size:15px;" id="openrecognition">
              <i class="fa-solid fa-award" id="openrecognition"></i>
          </button>
          Recognition View
      </a>


      <a class="dropdown-item">
        <button class="btn  btn-success btn-sm btn-flat mb-3" style="font-size:15px;"  id="certificate">
            <i class="fa-solid fa-certificate" id="certificate"></i>
        </button>
        Give Certificate
    </a>
    <a class="dropdown-item">
        <button class="btn  btn-success btn-sm btn-flat mb-3" style="font-size:15px;"  id="viewcertificate">
            <i class="fa-solid fa-certificate" id="viewcertificate"></i>
        </button>
        Certificate View
    </a>
</div>
</div>
<!-- recognition  view -->
<div class="modal" id="recogopen" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rev">Recognition Achievement <span id="reviewEmployeeName"></span></h5>
            </div>
            <div class="modal-body">
                <div class="col-md-12" style="margin-bottom:5%;">


                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th>Employee ID</th>
                          <th>Achievement</th>
                          <th>Recognition message</th>
                          <th>Date</th>
                      </tr>
                  </thead>
                  <?php 

                  $id=$social->employee_id;
                  $selet ="select  * from hr1_social_recognition_achievement where  employee_id='$id' ";
                  $query=mysqli_query($conn,$selet);
                  ?> 
                  <tbody>
                    <?php while($row=mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td><?php echo  $row['employee_id']?></td>
                            <td><?php echo $row['achievement']?></td>
                            <td> <?php echo $row['recognition_message']?></td>
                            <td> <?php echo $row['created_at']?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="recclose">Close</button>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<!-- certificate view -->
<div class="modal" id="certificateopen" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rev">Certificate<span id="reviewEmployeeName"></span></h5>
            </div>
            <div class="modal-body">

                <div class="col-md-12" style="margin-bottom:5%;">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th>Employee ID</th>
                          <th>Certificate File</th>
                          <th>Certificate message</th>
                          <th>Date</th>
                      </tr>
                  </thead>
                  <?php 

                  $id=$social->employee_id;
                  $certificateselet ="select  * from hr1_certificate where  employee_id='$id' ";
                  $certificatequery=mysqli_query($conn,$certificateselet);
                  ?> 
                  <tbody>
                    <?php while($certificaterow=mysqli_fetch_assoc($certificatequery)){?>
                        <tr>
                            <td><?php echo  $certificaterow['employee_id']?></td>
                            <td>  
                                <?php if(empty($certificaterow['certificate_file'])){?>
                                    <label>Empty file</label>
                                <?php  }else{ ?>
                                 <button class="btn btn-flat btn-sm btn-primary"><a href="http://127.0.0.1:8000/assets/img/<?php echo $certificaterow['certificate_file']?>
                                 " style="color:white;" target="_blank" rel="noopener noreferrer">View</a></button>
                             <?php } ?>
                         </td>
                         <td> <?php echo $certificaterow['message']?></td>
                         <td> <?php echo $certificaterow['created_at']?></td>
                     </tr>
                 <?php }?>
             </tbody>
         </table>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closesecertificate">Close</button>
        </div>

    </div>
</div>
</div>
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

            <form method="POST"   action="{{url('socialrecognition')}}" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="row" style="margin-top:5%;">
               <div class=" col-md-6"><label>EMPLOYEE ID</label>
                <input type="text" class="form-control" id="empid"  name="empid"></div>
                <div class=" col-md-6"><label>EMPLOYEE NAME</label>
                    <input type="text" class="form-control" id="fname" disabled></div> 
                </div>

                <input type="hidden" name="employee_id" id="employee_id">
                <p><strong>Feedback:</strong></p>
                <textarea id="reviewFeedback" name="feedback" class="form-control" rows="5" placeholder="Enter feedback here..."></textarea>
                <div class="form-group mt-3">
                    <label for="reviewRating">Rating:</label>
                    <select id="reviewRating" name="rating" class="form-control">
                        <option value="">Select a rating</option>
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Performance Review</label>
                    <select class="form-control" name="performance">
                       <option></option>
                       <option>Active</option>
                       <option>Inactive</option>
                   </select>
               </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalclose">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save Review</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>


<!---RECOGNITION --->
<div class="modal" id="sendrecognitionmodal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabels" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabels">RECOGINITION<span id="reviewEmployeeName"></span></h5>
            </div>
            <div class="modal-body">
             <form method="POST"   action="{{url('socialrecognitionstore')}}" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <!---employee id--->
              <div class="form-group">
                 <input type="hidden" name="employeeidrec" id="employeeidrec">
             </div>
             <div class="form-group">
                <label>EMPLOYEE ID</label>
                <input type="text" name="employeerec" id="employeerec" class="
                form-control">
            </div>

            <div class="form-group">
                <label>EMPLOYEE NAME</label>
                <input type="text" name="fullnamerec" id="fullnamerec" class="
                form-control">
            </div>

            <div class="form-group">
                <label>ACHIEVEMENT</label>
                <input type="text" name="achievementrec" id="achievementrec" class="
                form-control">
            </div>


            <div class="form-group">
                <label>RECOGNITION MESSAGE</label>
                <textarea class=" form-control" name="messagerec" id="messagerec"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalcloserecognition">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>


<!---RECOGNITION --->
<div class="modal" id="certificationmodal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabe" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabe">CERTIFCATE<span id="reviewEmployeeName"></span></h5>
            </div>
            <div class="modal-body">
                <form action="{{url('certificate')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('POST') 
                    <!---employee id--->
                    <div class="form-group">
                     <input type="hidden" name="employee_id_certificate" id="employee_id_certificate">
                 </div>
                 <div class="form-group">
                    <label>EMPLOYEE ID</label>
                    <input type="text" name="ceremployeeid" id="ceremployeeid" class="
                    form-control" disabled>
                </div>

                <div class="form-group">
                    <label>EMPLOYEE NAME</label>
                    <input type="text" name="certificatefullname" id="certificatefullname" class="
                    form-control" disabled>
                </div>

                <div class="form-group">
                    <label>UPLOAD CERTIFICATE</label>
                    <input type="file" name="filecertificate" id="filecertificate" class="
                    form-control">
                </div>


                <div class="form-group">
                    <label>MESSAGE</label>
                    <textarea class=" form-control"  name="certificate_message"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="certificateclose">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
@endsection
<script>
 $(document).on('click', '#add', function () {
   $('form')[0].reset();
   var tr = $(this).closest("tr").find('td');
   $('#empid').val(tr.eq(0).text());
   $('#fname').val(tr.eq(1).text());
});

 $(document).on('click', '#modalclose', function () {
  $('#reviewModal').hide();
});


 $(document).on('click', '#openmodal', function () {
  $('#reviewModal').show();
});

 $(document).on('click', '#openrecognition', function () {

    $('#recogopen').show();
});


 $(document).on('click', '#recclose', function () {

    $('#recogopen').hide();
});

 $(document).on('click', '#viewcertificate', function () {
    $('#certificateopen').show();
});

 $(document).on('click', '#closesecertificate', function () {
    $('#certificateopen').hide();
})
 $(document).on('click','#recognitionopen', function () {
  $('#sendrecognitionmodal').show();
  var tr = $(this).closest("tr").find('td');
  $('#employeerec').val(tr.eq(0).text());
  $('#employeeidrec').val(tr.eq(0).text());
  $('#fullnamerec').val(tr.eq(1).text());
});
 $(document).on('click','#modalcloserecognition', function () {
  $('#sendrecognitionmodal').hide();
});
 $(document).on('click','#certificate', function () {
  $('#certificationmodal').show();
  var tr = $(this).closest("tr").find('td');
  $('#certificatefullname').val(tr.eq(1).text());
  $('#employee_id_certificate').val(tr.eq(0).text());
  $('#ceremployeeid').val(tr.eq(0).text());
});

 $(document).on('click','#certificateclose', function () {
  $('#certificationmodal').hide();
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