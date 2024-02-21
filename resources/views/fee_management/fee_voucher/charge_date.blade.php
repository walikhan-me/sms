


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
          <h5 class="card-title">Set Charge and Posting Date</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" enctype="multipart/form-data"  method="post" action="/post_charge_date">
            @csrf
            
       
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="father_name" aria-label="section" value="{{ old('fee_voucher_type') }}" name="fee_voucher_type">
                    <option >select fee voucher type</option>
                    <option value="1">Single Student Fee Voucher</option>
                    <option value="2">Bulk Student Fee Voucher </option>
                </select>
                <label for="floatingSelect">Fee Voucher type</label>
              </div>
              @error('fee_voucher_type')
                    <span>{{ $message }}</span>
              @enderror
             
            </div>

          <div class="col-md-6">
              <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="date_issued_for_voucher" name="date_issued_for_voucher" value="{{old('date_issued_for_voucher')}}">
                  <label for="date_issued">Date Issued</label>
              </div>
              @error('date_issued_for_voucher')
              <span>{{$message}}</span>
              @enderror
          </div>
          <div class="col-md-6">
              <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="date_posting_for_voucher" name="date_posting_for_voucher" value="{{old('date_posting_for_voucher')}}">
                  <label for="date_issued">Date Posting</label>
              </div>
              @error('date_issued_for_voucher')
              <span>{{$message}}</span>
              @enderror
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




