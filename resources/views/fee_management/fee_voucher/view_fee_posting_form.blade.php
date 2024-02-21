


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
          <h5 class="card-title">View Fee Posting Form</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" enctype="multipart/form-data" id='itemForm' method="post" action="/submit_student_fee">
            @csrf

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="sid" aria-label="section" name="sid">
                @if(isset($student_data))
                   <option value="{{$student_data->sid}}">{{$student_data->sid}}</option>
                @else  
                <p>No student data found</p>
                 @endif      
                </select>
                <label for="floatingSelect">sid</label>
              </div>
            </div>
    

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="student_name" aria-label="student_name" name="student_name">
                    @if(isset($student_data))
                      <option value="{{$student_data->student_name}}">{{$student_data->student_name}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                </select>
                <label for="floatingSelect">section</label>
              </div>
            </div>
            
          
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="class" aria-label="class" name="class">
                    @if(isset($student_data))
                      <option value="{{$student_data->class}}">{{$student_data->class}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                </select>
                <label for="floatingSelect">class</label>
              </div>
            </div>
          


            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="section" aria-label="section" name="section">
                    @if(isset($student_data))
                      <option value="{{$student_data->section}}">{{$student_data->section}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                </select>
                <label for="floatingSelect">section</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="father_name" aria-label="section" name="father_name">
                     @if(isset($student_data))
                      <option value="{{$student_data->father_name}}">{{$student_data->father_name}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                </select>
                <label for="floatingSelect">Father name</label>
              </div>
             
            </div>
           
           
            
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="voucher_type" aria-label="section" name="voucher_type">
                
                    @if(isset($student_data))
                      <option value="{{$student_data->voucher_type}}">{{$student_data->voucher_type}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                
                </select>
                <label for="floatingSelect">Voucher type</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="expiry_date" name="expiry_date">
                
                    @if(isset($student_data))
                      <option value="{{$student_data->expiry_date}}">{{$student_data->expiry_date}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                </select>
                <label for="floatingSelect">Posting Date</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="date_issued" name="date_issued">
                
                    @if(isset($student_data))
                      <option value="{{$student_data->date_issued}}">{{$student_data->date_issued}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                
                </select>
                <label for="floatingSelect">Charge Date</label>
              </div>
            </div>


            
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="amount" name="amount">
                
                    @if(isset($student_data))
                      <option value="{{$student_data->amount}}">{{$student_data->amount}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                
                </select>
                <label for="floatingSelect">Amount</label>
              </div>
            </div>


            
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="status" name="status">
                
                    @if(isset($student_data))
                      <option value="{{$student_data->status}}">{{$student_data->status}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                
                </select>
                <label for="floatingSelect">Status</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="voucher_id" name="voucher_id">
                
                    @if(isset($student_data))
                      <option value="{{$student_data->voucher_id}}">{{$student_data->voucher_id}}</option>
                    @else  
                    <p>No student data found</p>
                    @endif  
                  
                
                
                </select>
                <label for="floatingSelect">Voucher Id</label>
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




