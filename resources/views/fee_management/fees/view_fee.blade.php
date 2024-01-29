
@extends('welcome')
@section('styles')


@endsection

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
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Fee Table</h5>
              

              <!-- Default Table -->
              <table class="table" id='dataappend' >
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">feetype</th>
                    <th scope="col">tutionfee</th>
                    <th scope="col">labfee</th>
                    <th scope="col">examinationfee</th>
                    <th scope="col">status</th>
                    
                  </tr>
                </thead>
                <tbody>
                     @foreach($view_fees as $fee)
                        <tr>
                            <td>{{ $fee->id }}</td>
                            <td>{{ $fee->feetype }}</td>
                            <td>{{ $fee->tutionfee }}</td>
                            <td>{{ $fee->labfee }}</td>
                            <td>{{ $fee->examinationfee }}</td>
                            <td>{{ $fee->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

@section('content')
@endsection()