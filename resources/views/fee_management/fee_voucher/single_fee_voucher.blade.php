
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
          <h5 class="card-title">Single Student Fee voucher</h5>

          <!-- Floating Labels Form --> 
          <form class="row g-3" enctype="multipart/form-data"  method='POST' id='itemForm' action='/create_single_voucher'>
            @csrf
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="student_cid" name="student_cid" placeholder="Student Cid">
                <label for="floatingName">Student Cid</label>
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