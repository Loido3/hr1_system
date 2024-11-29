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

<form action="{{ route('newhire.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
                            <th>Position</th>
                            <th>Date Hired</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="hiresTableBody">
                        @foreach($newEmployees as $employee)
                        <tr>
                            <td>{{ $employee->applicant_id }}</td>
                            <td>{{ $employee->firstname}} {{ $employee->firstname}}{{ $employee->lastname}}</td>
                            <td>{{ $employee->jobrole }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>   <span class="badge bg-success">{{ $employee->applicant_status }}</span></td>
                           
                          

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>


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
</script>



@endsection
