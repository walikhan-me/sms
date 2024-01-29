
@extends('welcome')
@section('styles')


@endsection



@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Create Fee</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">fee_managment</a></li>
      <li class="breadcrumb-item">Fees</li>
      <li class="breadcrumb-item active">Create Fee</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    

    <div class="col-lg-12">

      

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Fee Type</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" method='post' enctype="multipart/form-data" id='fee_form' action ='/submitfee'>
            @csrf
            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Fee Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='fee_type'>
                      <option selected>Fee type</option>
                      <option value="monthly_fee">Monthly</option>
                     
                      <option value="halfyearly_fee">Half Yearly</option>
                    </select>
                  </div>
                </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" value='active' name="activefee" >
                    <label for="schoollogo">Status</label>
                </div>
            </div>
          <div class="field">
            <label class="label">Session</label>
              <div class="control">
                  <div class="select" >
                    <select name='session_'>
                      <option value='2023-2024'>2023-2024</option>
                    
                    </select>
                  </div>
              </div>
          </div>
            <div class="col-md-12">
            <input type="hidden" name="tution_fee" value="0">
                 <div class="col-md-12 offset-sm-12">
                    <div class="form-check">
                      <input class="form-check-input" name = 'tution_fee' type="checkbox" id="tution_fee" value='tution_fee'>
                      <label class="form-check-label" for="gridCheck1">
                        Tutuion fee
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name = 'lab_fee' type="checkbox" id="lab_fee" value='lab_fee'>
                      <label class="form-check-label" for="gridCheck1">
                         Lab fee
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name = 'examinationfee' type="checkbox" id="examinationfee"  value='examinationfee'>
                      <label class="form-check-label" for="gridCheck1">
                      examination fee
                      </label>
                    </div>



                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="fee_id_" aria-label="province" name="fee_id_">
                          <option selected>Fee id</option>
                            <option value="1">tutionfee</option>
                            <option value="2">labfee</option>
                            <option value="3">examinationfee</option>
                          </select>
                          <label for="floatingSelect">Fee id</label>
                        </div>
                      </div>
                  </div>


                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </div>


            
          </form><!-- End floating Labels Form -->

        </div>
      </div>

    </div>
  </div>

@endsection()