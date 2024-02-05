
@extends('welcome')
@section('styles')


@endsection

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Layouts</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    

    <div class="col-lg-12">

      

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Generate single voucher</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" enctype="multipart/form-data" id='itemForm' method="post" action="/print_single_voucher">
            @csrf

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="sid" aria-label="section" name="sid">
                @foreach ($students_data as $student)
                    <option value="{{ $student->sid }}">{{ $student->student_name }} - {{ $student->class }}</option>
                @endforeach
                        
                </select>
                <label for="floatingSelect">sid</label>
              </div>
            </div>
         
           
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="student_name" aria-label="province" name="student_name">
                @foreach ($students_data as $student)
                   <option value="{{ $student->student_name }}" >{{ $student->student_name }}</option>
                @endforeach
                <label for="floatingSelect">Student Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="class" aria-label="province" name="class">
                  @foreach ($students_data as $student)
                    <option value="{{ $student->class }}" >{{ $student->class }}</option>
                  @endforeach
                
                </select>
                <label for="floatingSelect">class</label>
              </div>
            </div>

           

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="section" aria-label="section" name="section">
                  @foreach ($students_data as $student)
                    <option value="{{ $student->section }}" >{{ $student->section }}</option>
                  @endforeach
                
                </select>
                <label for="floatingSelect">class</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="father_name" aria-label="section" name="father_name">
                  @foreach ($students_data as $student)
                    <option value="{{ $student->father_name }}" >{{ $student->father_name }}</option>
                  @endforeach
                
                </select>
                <label for="floatingSelect">Father name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="amount" name="amount">
                  <label for="amount">Amount</label>
              </div>
           </div>
            
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="feetype" aria-label="section" name="feetype">
                
                    <option value="regular_voucher" >Regular Voucher</option>
                
                
                </select>
                <label for="floatingSelect">fee type</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                  <label for="expiry_date">Expiry Date</label>
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="date_issued" name="date_issued">
                  <label for="date_issued">Date Issued</label>
              </div>
          </div>
            
            <!-- <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; margin-top: 10px;" > -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

            
          </form><!-- End floating Labels Form -->

        </div>
      </div>

    </div>
  </div>


@section('content')
@endsection()




