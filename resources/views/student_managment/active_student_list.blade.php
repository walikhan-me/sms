@extends('welcome')


@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Student</h4>
                          </div>
                          <div class="modal-body">
                             <form  enctype="multipart/form-data" action="/edit_active_student" method="post">
                               @csrf
                                  <div class="col">
                                    <label for="">sid</label>
                                    <input type="hidden" class="form-control" id="id_" name="id" value="">
                                    <input type="text" class="form-control" id="sid" name="sid" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">student_name</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">class</label>
                                    <input type="text" class="form-control" id="class" name="class" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">section</label>
                                    <input type="text" class="form-control" id="section" name="section" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">father_name</label>
                                    <input type="text" class="form-control" id="father_name"  name="father_name" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">mobile_number</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="">
                                  </div>
                                  <div>
                                  

                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary">Action</button>
                                  
                                
                                 
                            
                              </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
        </div>

        <div id="myModal_" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Student</h4>
                          </div>
                          <div class="modal-body">
                          <form enctype="multipart/form-data" action="{{ url('/inactive_student_') }}" method="post">
                               @csrf
                                  <div class="col">
                                    <label for="">sid</label>
                                    <input type="hidden" class="form-control" id="u_id_" name="id" value="">
                                    <input type="text" class="form-control" id="sid_" name="sid" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">student_name</label>
                                    <input type="text" class="form-control" id="student_name_" name="student_name" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">class</label>
                                    <input type="text" class="form-control" id="class_" name="class" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">section</label>
                                    <input type="text" class="form-control" id="section_" name="section" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">father_name</label>
                                    <input type="text" class="form-control" id="father_name_"  name="father_name" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">mobile_number</label>
                                    <input type="text" class="form-control" id="mobile_number_" name="mobile_number" value="">
                                  </div>
                                  <div class="col">
                                  <label for="">status</label>
                                    <input type="text" class="form-control" id="status_" name="status" value="">
                                  </div>
                                  <div>
                                  

                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary">Inactive</button>
                                  
                                
                                 
                            
                              </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
        </div>
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table" id='dataappend_' >
                <thead>
                  <tr>
                    <th scope="col">S.no</th>
                    
                    <th scope="col">Sid</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>

                    <th scope="col">Father Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Inactive</th>
                    
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
  <script>
    $(document).ready(function() {
        active_student_list();
        $(document).on('click','.edit_student_btn',function(){
          var student = $(this).data('student-id');
          $.ajax({
            url: '/edit_student/'+student,
                type: 'GET',
                data: {student:student},
               
                success: function(response) {
                    console.log("asdasd"+response);
                    $('#myModal #id_').val(response.id);
                    $('#myModal #sid_').val(response.sid);
                    $('#myModal #student_name').val(response.student_name);
                    $('#myModal #class').val(response.class);
                    $('#myModal #section').val(response.section);
                    $('#myModal #father_name').val(response.father_name);
                    $('#myModal #mobile_number').val(response.mobile_number);
                    $('#myModal #status').val(response.status);
                },
          })
          
          
        })
        //

        $(document).on('click','.edit_student_btn_',function(){
       
          var student = $(this).data('student-id');
         
          $.ajax({
            url: '/inactive_student/'+student,
                type: 'GET',
                data: {student:student},
               
                success: function(response) {
                    console.log(response);
                    $('#myModal_ #u_id_').val(response.id);
                    $('#myModal_ #sid_').val(response.sid);
                    $('#myModal_ #student_name_').val(response.student_name);
                    $('#myModal_ #class_').val(response.class);
                    $('#myModal_ #section_').val(response.section);
                    $('#myModal_ #father_name_').val(response.father_name);
                    $('#myModal_ #mobile_number_').val(response.mobile_number);
                    $('#myModal_ #status_').val(response.status);
                },
          })
          
          
        })

        //
        function active_student_list() {
            $.ajax({
                url: 'student_managment/active_student_list',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    var tbody = $("#dataappend_ tbody");
                    $.each(response.data, function(index, student) {
                        var row =
                            "<tr>" +
                            '<td>' + (student.id || '') + '</td>' +
                            '<td>' + (student.sid || '') + '</td>' +
                            '<td>' + (student.student_name || '') + '</td>' +
                            '<td>' + (student.class || '') + '</td>' +
                            '<td>' + (student.section || '') + '</td>' +
                            '<td>' + (student.father_name || '') + '</td>' +
                            '<td>' + (student.mobile_number || '') + '</td>' +
                            '<td>' + (student.status || '') + '</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-info btn-sm edit_student_btn" data-toggle="modal" data-student-id="'+student.id +'" data-target="#myModal">Action</button>'+
                     
                            '</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-info btn-sm edit_student_btn_" data-toggle="modal" data-student-id="'+student.id +'" data-target="#myModal_">Inactive</button>'+
                     
                            '</td>' 
                             +
                            '</tr>';

                        console.log(row);

                        tbody.append(row);
                    });

                    
                },
            });
        }
      

        

      
         
    });
</script>
 
@endsection()