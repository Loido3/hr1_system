
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

@extends('layouts/layoutMaster')
@section('title', 'Payroll')
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

<div class="card">
  <div class="card">
    <div style="display:flex;">
  
     <form class=" mt-3 ml-3 mw-100 navbar-search"  style="margin-left:7px" autocomplete="off">
      <div class="input-group">
        <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" >
        <div class="input-group-append">
          <button class="btn btn-primary" type="button" style="height:40px;">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="card-datatable table-responsive">
    <table class="datatables-projects table border-top">
      <thead>
        <tr>
         <th>JOB ID</th>
         <th>JOB QUALIFICATION</th>
         <th>STATUS</th>
          <th>Date Request</th>
         <th>ACTION</th>
       </tr>
     </thead>
     <tbody>
      @foreach($job as $row)
      <tr class="contents">
       <td>{{ $row->job_id }}</td>
       <td>{{ $row->jobrole }}</td>
       <td>{{ $row->status}}</td>    
       <td>{{ $row->created_at}}</td>   
       <td><button class="btn btn-primary btn-flat btn-sm" id="open_modal">Update</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="recruitement_modal">
  <div class="modal-dialog" role="document">
    <form  action="{{url('/jobqualification/view')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">JOB QUALIFICATION</h5>
        </div>
        <div class="modal-body">
       
  <input type="" name="getid" id="update_id" style="display:none;">
     <div class="form-group mb-3">
   <textarea name="editor" id="editor " class="ckeditor"><p id="gettext"></p></textarea>
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    </script>
                       </div>

          <input type="text"  value="pending" style="display:none;" name="status">
          <div class="modal-footer">
            <button type="SUBMIT" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-danger" id="modal_close">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>




  @endsection


    <script >
  $(document).on('click','#update_recruitment', function () {
    $('#updating_recruitment').modal('show');
    $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    $('#employee_id').val(tr.eq(1).text());
var  f=tr.eq(2).text();
        $('#department_update').val(f.trim()).change();
    $('#jobrole_update').val(tr.eq(1).text());
      $('#recruitment_id_update').val(tr.eq(0).text());
  });




     $(document).on('click', '#close_update', function () {
      $('#updating_recruitment').modal('hide');
    });
  </script>

  <script >
    $(document).on('click', '#open_modal', function () {
      $('#recruitement_modal').modal('show');
          $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
     $("#editor").attr(tr.eq(1).text())
          $("#update_id").val(tr.eq(0).text())


    });
    $(document).on('click', '#modal_close', function () {
      $('#recruitement_modal').modal('hide');
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

