@extends('welcome')


@section('content')

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">






  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div>
<section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table" id='dataappend' >
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">schoolname</th>
                    <th scope="col">address</th>
                    <th scope="col">contactnumber</th>
                    <th scope="col">city</th>
                    <th scope="col">province</th>
                    <th scope="col">block</th>
                    <th scope="col">ownername</th>
                    <th scope="col">schoollogo</th>
                    <th scope="col">Login</th>
                    
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

    </main>

    <script>
        $(document).ready(function() {
          readata()
            function readata(){
              $.ajax({
                url: '/get_data',
                type: 'GET',
                success: function(response) {
                    console.log(response)
                    platetable(response);
                },
              
              })
            }
          
          
            function platetable( data){
             
              var tbody = $("#dataappend tbody");
              $.each(data,function(index,post){
                var row = "<tr>" +
                                    '<td>' + post.id + '</td>' +
                                    '<td>' + post.schoolname + '</td>' +
                                    '<td>' + post.address + '</td>' +
                                    '<td>' + post.contactnumber + '</td>' +
                                    '<td>' + post.city_name + '</td>' +
                                    '<td>' + post.province_name + '</td>' +
                                    '<td>' + post.block + '</td>' +
                                    '<td>' + post.ownername + '</td>' +
                                    '<td>' + '<img src="' + '{{ asset("storage/school_logos/") }}' + '/' + post.schoollogo + '" height="50px"/>' + '</td>' +
                                    '<td><a href="school/singleschool">Login</a></td>' +
                                  '</tr>';
                                  tbody.append(row)
              })
            }
        
            })
    </script>
@endsection('content')