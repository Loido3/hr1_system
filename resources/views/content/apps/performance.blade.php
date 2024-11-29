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
            <input type="text" id="search" class="form-control mt-2" placeholder="Search by Employee Name or ID">
        </div>
        <div class="card-datatable table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Last Review Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="performanceTableBody">
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Sales</td>
                        <td>2024-01-15</td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="openReview(1)">View Review</button>
                            <button class="btn btn-warning btn-sm" onclick="scheduleReview(1)">Schedule Review</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>Marketing</td>
                        <td>2024-02-20</td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="openReview(2)">View Review</button>
                            <button class="btn btn-warning btn-sm" onclick="scheduleReview(2)">Schedule Review</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for Viewing Review -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Performance Review for <span id="reviewEmployeeName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Feedback:</strong></p>
                <textarea id="reviewFeedback" class="form-control" rows="5" placeholder="Enter feedback here..."></textarea>
                <div class="form-group mt-3">
                    <label for="reviewRating">Rating:</label>
                    <select id="reviewRating" class="form-control">
                        <option value="">Select a rating</option>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveReview()">Save Review</button>
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

<script>
    let currentEmployeeId;

    function openReview(employeeId) {
        currentEmployeeId = employeeId;
        const employeeName = document.querySelector(`#performanceTableBody tr:nth-child(${employeeId}) td:nth-child(2)`).innerText;
        document.getElementById('reviewEmployeeName').innerText = employeeName;
        $('#reviewModal').modal('show');
    }

    function saveReview() {
        const feedback = document.getElementById('reviewFeedback').value;
        const rating = document.getElementById('reviewRating').value;

        if (!feedback || !rating) {
            alert('Please fill in both feedback and rating.');
            return;
        }

        alert(`Review saved for Employee ID: ${currentEmployeeId}\nFeedback: ${feedback}\nRating: ${rating}`);
        $('#reviewModal').modal('hide');
        document.getElementById('reviewFeedback').value = '';
        document.getElementById('reviewRating').value = '';
    }

    function scheduleReview(employeeId) {
        currentEmployeeId = employeeId;
        const employeeName = document.querySelector(`#performanceTableBody tr:nth-child(${employeeId}) td:nth-child(2)`).innerText;
        document.getElementById('scheduleEmployeeName').innerText = employeeName;
        $('#scheduleModal').modal('show');
    }

    function confirmSchedule() {
        const reviewDate = document.getElementById('reviewDate').value;

        if (!reviewDate) {
            alert('Please select a date for the review.');
            return;
        }

        alert(`Review scheduled for Employee ID: ${currentEmployeeId} on ${reviewDate}`);
        $('#scheduleModal').modal('hide');
        document.getElementById('reviewDate').value = '';
    }

    document.getElementById('search').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('#performanceTableBody tr');

        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const id = row.cells[0].textContent.toLowerCase();
            row.style.display = (name.includes(query) || id.includes(query)) ? '' : 'none';
        });
    });
</script>

</body>
@endsection
