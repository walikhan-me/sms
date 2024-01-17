@extends('welcome')


@section('content')
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inactive Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Student Management</a></li>
          <li class="breadcrumb-item">Inactive Student List</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Inactive Student</h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable" id="inactive_datatble">
                <thead>
                  <tr>
                    <th>Id.</th>
                    <th>Sid.</th>
                    <th>
                      <b>Student</b>Name
                    </th>
                    <th>Class.</th>
                    <th>Section</th>
                    
                    <th>Father</th>
                    <th>Section</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
               
                    @foreach($inactiveStudents as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->sid }}</td>
                            <td>{{ $student->student_name }}</td>
                            <td>{{ $student->class }}</td>
                            
                            <td>{{ $student->section }}</td>
                            <td>{{ $student->father_name }}</td>
                            <td>{{ $student->mobile_number }}</td>
                            <td>{{ $student->status }}</td>
                            <!-- Add other columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>


