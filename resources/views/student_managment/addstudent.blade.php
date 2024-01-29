
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
          <h5 class="card-title">Add Student</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" enctype="multipart/form-data" id='add_student_form'>
            @csrf
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student name">
                <label for="floatingName">student name</label>
              </div>
            </div>
           
            <div class="col-md-12">
              <div class="form-floating mb-3">
                <select class="form-select" id="class" aria-label="class" name="class">
                <option selected>Class</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
                <label for="floatingSelect">Section</label>
              </div>
            </div>
           
            <div class="col-md-12">
              <div class="form-floating mb-3">
                <select class="form-select" id="section" aria-label="section" name="section">
                <option selected>Section</option>
                  <option value="a">A</option>
                  <option value="b">B</option>
                  <option value="c">C</option>
                </select>
                <label for="floatingSelect">Section</label>
              </div>
            </div>
           
          
           
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="fathername" name="fathername" placeholder="father name ">
                <label for="fathername">father name</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="number" class="form-control" id="fathercnic" name="fathercnic" placeholder="father cnic">
                <label for="schoollogo">Father Cnic</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="mobile number">
                <label for="schoollogo">Mobile number</label>
              </div>
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
            <div class="col-md-12">
              <div class="form-floating">
              <input type="checkbox" id="check1" name="active" value="active" >
                  <label class="form-check-label" for="check1">Active</label>
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

  <script>
    $(document).ready(function() {

        $('#add_student_form').on('submit',function(e){
            e.preventDefault()

            
            var formData = new FormData(this);
            
          
            $.ajax({
              url: '/add_student_db',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                   
                },
                // error: function(xhr) {
                //     if(xhr.errors ===422){
                //       var errors = xhr.responseJSON.errors;
                //       $.each(errors, function(key, value) {
                        
                //         console.log(value[0]);
                //         alert(value[0])
                //     });
                //     }else {
                //        console.log('Error:', xhr);
                   
                //     }
                // }
            })
        })

    });
</script>
@endsection()