<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@extends('layouts/layoutMaster')
@section('title', 'New hire')

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/fullcalendar/fullcalendar.scss',
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/select2/select2.scss',
'resources/assets/vendor/libs/quill/editor.scss',
'resources/assets/vendor/libs/@form-validation/form-validation.scss',
])
@endsection

@section('page-style')
@vite(['resources/assets/vendor/scss/pages/app-calendar.scss'])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/fullcalendar/fullcalendar.js',
'resources/assets/vendor/libs/@form-validation/popular.js',
'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
'resources/assets/vendor/libs/@form-validation/auto-focus.js',
'resources/assets/vendor/libs/select2/select2.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/moment/moment.js',
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/app-calendar-events.js',
'resources/assets/js/app-calendar.js',
])
@endsection

@section('content')


<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">New Hire Management</h4>
            <input type="text" id="search" class="form-control mt-2" placeholder="Search by Employee ID or Name" onkeyup="searchTable()">
        </div>
        <div class="card-datatable table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Date Hired</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="hiresTableBody">
                    @foreach($newEmployees as $employee)
                    <tr>
                        <td>{{ $employee->appid }}</td>
                        <td>{{ $employee->firstname}} {{ $employee->lastname}}</td>
                        <td>{{ $employee->dep}}</td>
                        <td>{{ $employee->jobrole }}</td>
                        <td>{{ $employee->date_hired }}</td>
                        <td> <span class="badge bg-success">{{ $employee->applicant_status }}</span></td>
                        <td style="display:none;">{{ $employee->firstname }}</td>
                        <td style="display:none;">{{ $employee->middlename }}</td>
                        <td style="display:none;">{{ $employee->lastname }}</td>
                        <td style="display:none;">{{ $employee->age }}</td>
                        <td style="display:none;">{{ $employee->gender }}</td>
                        <td style="display:none;">{{ $employee->address }}</td>
                        <td style="display:none;">{{ $employee->email }}</td>
                        <td style="display:none;">{{ $employee->contact }}</td>
                        <td>   
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="ti ti-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu">
                                  <form method="POST" action="{{url('deployed')}}">
                                      @csrf
                                      @method('POST')
                                      <a class="dropdown-item">
                                        <input type="text" name="deployed"  value="{{ $employee->apply_id}}" style="display:none;">
                                        <button type="submit"  name="submit" class="btn  btn-danger btn-sm btn-flat mb-3" style="font-size:15px;">
                                          <i class="fa-solid fa-check-double"></i>
                                      </button>
                                      Deploy
                                  </a>
                              </form>
                              <a class="dropdown-item">
                              
                                <button type="button"  id="viewmodal" class="btn  btn-warning btn-sm btn-flat mb-3" style="font-size:15px;">
                                  <i class="fa-solid fa-eye"  id="viewmodal"></i>
                              </button>
                              View
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



<!-- Modal for Viewing for  employee info -->
<div class="modal" id="employeemodal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        
                <h5 style="text-align:center;margin-top:3%;" id="reviewModalLabel">Employee Information<span id="reviewEmployeeName"></span></h5>
         
            <div class="modal-body">

<div class="row">

  <div class="form-group col-md-3">
      <label>EMPLOYEE ID</label>
      <input type="text" class="form-control" disabled id="employeeid">   
     </div>  

       <div class="form-group col-md-3">
      <label>FIRST NAME</label>
      <input type="text" class="form-control" disabled id="fname">   
     </div>

       <div class="form-group col-md-3">
      <label>MIDDLE NAME</label>
      <input type="text" class="form-control" disabled id="mdname">   
     </div>

      <div class="form-group col-md-3">
      <label>LAST NAME</label>
      <input type="text" class="form-control" disabled id="lname">   
     </div>

       <div class="form-group col-md-3">
      <label>AGE</label>
      <input type="text" class="form-control" disabled id="age">   
     </div>

      <div class="form-group col-md-3">
      <label>GENDER</label>
      <input type="text" class="form-control" disabled id="gender">   
     </div>


     <div class="form-group col-md-3">
      <label>ADDRESS</label>
      <input type="text" class="form-control" disabled id="address">   
     </div>

      <div class="form-group col-md-3">
      <label>EMAIL</label>
      <input type="text" class="form-control" disabled id="email">   
     </div>


      <div class="form-group col-md-3">
      <label>CONTACT NUMBER</label>
      <input type="text" class="form-control" disabled id="contact">   
     </div>


      <div class="form-group col-md-3">
      <label>DATE HIRED</label>
      <input type="text" class="form-control" disabled id="datehired">   
     </div>



</div>
     



            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <button class=" btn btn-danger" id="closemodal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function searchTable() {
        const searchInput = document.getElementById('search').value.toLowerCase();
        const tableRows = document.querySelectorAll('#hiresTableBody tr');

        tableRows.forEach(row => {
            const idCell = row.cells[0].textContent.toLowerCase();
            const nameCell = row.cells[1].textContent.toLowerCase();

            if (idCell.includes(searchInput) || nameCell.includes(searchInput)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
// Dummy functions for actions
    function sendWelcomeEmail(employeeId) {
        alert(`Welcome email sent to employee ID: ${employeeId}`);
    }

    function scheduleTraining(employeeId) {
        alert(`Training scheduled for employee ID: ${employeeId}`);
    }




     $(document).on('click', '#closemodal', function () {
      $('#employeemodal').hide();
  });
    $(document).on('click', '#viewmodal', function () {
      $('#employeemodal').show();
       $('form')[0].reset();
      var tr = $(this).closest("tr").find('td');
      $('#employeeid').val(tr.eq(0).text());
      $('#fname').val(tr.eq(6).text());
      $('#mdname').val(tr.eq(7).text());
      $('#lname').val(tr.eq(8).text());
      $('#age').val(tr.eq(9).text());
      $('#gender').val(tr.eq(10).text());
      $('#address').val(tr.eq(11).text());
      $('#email').val(tr.eq(12).text());
       $('#contact').val(tr.eq(13).text());
       $('#datehired').val(tr.eq(4).text());
  });
</script>
@endsection
