@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  
    <section>
        <form action="/berkas" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Berkas</label> 
              <input type="text" class="form-control" id="nama" name="nama" value="">
            </div>
              <div class="mb-3">
                <label for="berkas" class="form-label">Berkas</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
              </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>


</div>
</div>
@endsection