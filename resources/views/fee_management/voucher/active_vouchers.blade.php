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
              <h5 class="card-title">Inactive Vouchers</h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable" id="inactive_datatble">
                <thead>
                  <tr>
                    <th>Id.</th>
                    <th>voucher_id .</th>
                    <th>
                      Student Name
                    </th>
                    <th>Class.</th>
                    <th>Section</th> 
                    <th>Sid</th>
                    <th>Father</th>
                    <th>amount</th>
                    <th>Status</th>
                    <th>Expiry date</th>
                    <th>Date issued</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($activeStudent as $active_vouch) 
                    <tr>
                        <td>{{$active_vouch->id }}</td>
                        <td>{{$active_vouch->voucher_id  }}</td>
                        <td>{{$active_vouch->student_name }}</td>
                        <td>{{$active_vouch->class }}</td>
                        <td>{{$active_vouch->section }}</td>

                        <td>{{$active_vouch->sid }}</td>
                        <td>{{$active_vouch->father_name }}</td>
                        <td>{{$active_vouch->amount }}</td>
                        <td>{{$active_vouch->status }}</td>
                        
                        
                        <td>{{$active_vouch->expiry_date }}</td>
                        <td>{{$active_vouch->date_issued }}</td>
                       
                        
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


