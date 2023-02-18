@extends('layout')
@section('isi')
<body>
  
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-outline-primary"  href="/tambahnasabah"> + Tambah data nasabah</a>
          <a class="btn btn-outline-primary"  href="/tambahtransaksi"> + Tambah data transaksi </a>
          <a class="btn btn-outline-primary"  href="/liatpoint"> liat point </a>
          <br>
          
          <div class="card">
          
            <div class="card-header">
              <h5 class="card-title">Add new nasabah</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">                
              <div class="container">
                <div class="col-md">
                    <form action="/postnasabah" method="POST" >
                        {{ csrf_field() }}
                        <form>
                          <div class="col-6 mb-3">
                            <label for="Name" class="form-label">userName:</label>
                            <input type="name" name ="userName" class="form-control" id="exampleInputEmail1" >
                          </div>

                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button id="reset" type="reset" class="btn btn-warning">Reset</>
                          </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</html>
