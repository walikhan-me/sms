
@extends('welcome')
@section('styles')


@endsection

@section('content')
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
          <h5 class="card-title">Add School</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" enctype="multipart/form-data" id='itemForm'>
            @csrf
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="schoolname" name="schoolname" placeholder="school name">
                <label for="floatingName">school name</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Address" name="address" id="address" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Address</label>
              </div>
            </div>
           
            <div class="col-md-12">
              <div class="form-floating">
                <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="contact number">
                <label for="contactnumber">contact number</label>
              </div>
            </div>
           
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="city" aria-label="city" name="city">
     
                </select>
                <label for="floatingSelect">city</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select" id="province" aria-label="province" name="province">
                <option selected>provinces</option>
                  <option value="1">Sindh</option>
                  <option value="2">kpk</option>
                  <option value="3">punjab</option>
                </select>
                <label for="floatingSelect">province</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="block" name="block" placeholder="block name">
                <label for="floatingName">block</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="ownername" name="ownername" placeholder="owner name ">
                <label for="ownername">owner name</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="file" class="form-control" id="schoollogo" name="schoollogo" placeholder="school logo">
                <label for="schoollogo">school logo</label>
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

@endsection