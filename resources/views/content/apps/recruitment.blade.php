
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@extends('layouts/layoutMaster')
@section('title', 'RECRUITEMENT')
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
         <th>JOB ROLES NEEDED</th>
         <th>DEPARTMENT</th>
         <th>SALARY</th>
         <th>TIME</th>
         <th>STATUS</th>
         <th>HR1 DATE REQUEST</th>
         <th>ACTION</th>
       </tr>
     </thead>
     <tbody>
      @foreach($Recruite as $row)
      <tr class="contents">
       <td style="display:none;">{{ $row->recruitment_id }}</td>
       <td class="titles">{{ $row->jobrole }}</td>
       <td>{{ $row->department}}</td>
       <td>{{ $row->salary}}</td>
       <td>{{ $row->time}}</td>
       <td>
        <?php if($row->status=='pending'){?>
         <span class="badge bg-danger">{{ $row->status}}</span>
          <?php }else if($row->status=='on-going'){?>
              <span class="badge bg-success">{{ $row->status}}</span>
       <?php }else{?>
         <span class="badge bg-primary">{{ $row->status}}</span>
       <?php }?>
</td>
       <td>{{ $row->created_at}}</td>
       <td>
        <?php if($row->status=='pending'){?>
          <form method="POST" action="{{route('Recruiteupdate')}}" class="p-0 m-0">
            @csrf
            @method('POST')
            <input type="type" name="recruitment_id_insert"  value="{{$row->recruitment_id}}" style="display:none;">
            <input type="type" name="status_insert"  value="Approved" style="display:none;">
            <button type="submit" name="submit" class=" btn btn-primary btn-sm  btn-flat m-0" id="update_btn">Approved</button>
          </form>     
        <?php  }else{?>

          <button class=" btn btn-primary btn-sm  btn-flat m-0" id="post_open">Post
          </button>



        <?php  }?>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>





<div class="modal" tabindex="-1" role="dialog" id="post_modal">
  <div class="modal-dialog" role="document">
    <form  action="{{route('Recruiteupdating')}}" id="formAuthentication" class="mb-3" method="POST">
      @csrf
        @method('POST')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">REQUEST</h5>
        </div>
        <div class="modal-body">

            <div class="form-group">
            <label>Job Roles</label>
            <input  type="text" class="form-control" name="post_id" id="post_id"  style="display:none;" >
          </div>

          <div class="form-group">
            <label>Job Roles</label>
            <input  type="text" class="form-control" name="jobrole" id="jobrole" disabled >
          </div>

          <div class="form-group">
            <label>Department</label>
            <input type="" name="" class="form-control"  id="department" disabled>
            <option></option>
        
        </div>

        <div class="form-group">
          <label>SALARY</label>
          <input  type="text" class="form-control" name="salary" id="salary" disabled >
        </div>

        <div class="form-group">
          <label>TIME</label>
          <input  type="text" class="form-control" name="jobrole"  id="time" disabled>
        </div>
       
        <div class="form-group">
          <label>status</label>
          <input  type="text" class="form-control" name="status"  value="on-going"  style="display:none;">
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary">POST</button>
          <button type="button" class="btn btn-danger" id="modal_close">Close</button>
        </div>
      </div>
    </div>

  </form>
</div>
</div>





@endsection


<script >
  $(document).on('click','#post_open', function () {
    $('#post_modal').modal('show');
    $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    $('#jobrole').val(tr.eq(1).text());
    $('#department').val(tr.eq(2).text());
    $('#salary').val(tr.eq(3).text());
    $('#time').val(tr.eq(4).text());
      $('#post_id').val(tr.eq(0).text());
  });

  $(document).on('click', '#close_update', function () {
    $('#updating_recruitment').modal('hide');
  });
</script>

<script >
  $(document).on('click', '#modal_close', function () {
    $('#post_modal').modal('hide');
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