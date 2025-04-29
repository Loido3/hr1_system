@extends('layouts/layoutMaster')

@section('title', 'DASHBOARD')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'
])
@endsection

@section('page-style')
<!-- Page -->
@vite(['resources/assets/vendor/scss/pages/cards-advance.scss'])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/apex-charts/apexcharts.js',
  'resources/assets/vendor/libs/swiper/swiper.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
  ])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/dashboards-analytics.js'
])
@endsection

@section('content')


 <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="database_01"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>

     <div class="container-xxl flex-grow-1 container-p-y ">


       <div class="card-body">
         <div class="container" style="margin-top:3%;">

           <div class="row">


                   <div class="col-md-2  mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
      
         </div>
            <div class="col-md-2 bg-warning mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
              <div class="row">
                <div class="col-md-6">

                 <p style="font-size:30px;color:white;margin-top:15%;">  <?php
$applicants="select count(*) as total from hr4_recruitment where status='on-going' ";
$applicantquerys=mysqli_query($conn,$applicants);
$applicantrows=mysqli_fetch_assoc($applicantquerys);
echo $applicantrows['total'];
?></p>
               <p style="font-size:15px;color:white;margin-top:15%;">OPEN JOB POSITION</p>
             </div>

             <div class="col-md-6">
               <i class="fas fa-user-tie" style="font-size:40px;color:white;margin-top:30%;"></i>
             </div>
           </div>
         </div>


                 <div class="col-md-2 bg-success mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
              <div class="row">
                <div class="col-md-6">

                 <p style="font-size:30px;color:white;margin-top:15%;"> 
<?php
$applicant="select count(*) as total from hr1_applicant_apply where status='pending' ";
$applicantquery=mysqli_query($conn,$applicant);
$applicantrow=mysqli_fetch_assoc($applicantquery);
echo $applicantrow['total'];
?>
  
</p>
               <p style="font-size:15px;color:white;margin-top:15%;">NEW APPLICANTS</p>
             </div>

             <div class="col-md-6">
               <i class="fas fa-user-tie" style="font-size:40px;color:white;margin-top:30%;"></i>
             </div>
           </div>
         </div>



        <div class="col-md-2 bg-danger mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
              <div class="row">
                <div class="col-md-6">

                 <p style="font-size:30px;color:white;margin-top:15%;"><?php
$newhire="select count(*) as total from hr1_applicant_apply where status='Passed' ";
$newhirequery=mysqli_query($conn,$newhire);
$newhirerow=mysqli_fetch_assoc($newhirequery);
echo $newhirerow['total'];
?>
</p>
               <p style="font-size:15px;color:white;margin-top:15%;">NEW HIRES</p>
             </div>

             <div class="col-md-6">
               <i class="fas fa-user-tie" style="font-size:40px;color:white;margin-top:30%;"></i>
             </div>
           </div>
         </div>



        <div class="col-md-2 bg-primary mr-2" style="height:150px;border-radius:5px;margin-right:1%;margin-bottom:1%;">
              <div class="row">
                <div class="col-md-6">

                 <p style="font-size:30px;color:white;margin-top:15%;">0</p>
               <p style="font-size:15px;color:white;margin-top:15%;">EMPLOYEE ENGAGEMENT</p>
             </div>

             <div class="col-md-6">
               <i class="fas fa-user-tie" style="font-size:40px;color:white;margin-top:30%;"></i>
             </div>
           </div>
         </div>



</div>

</div>
</div>











</div>


@endsection
