@extends('layout')
@section('isi')
<body>
    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
        @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
        @endif  
          @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Add new transaksi</h5>
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
                    <form action="/posttransaksi" method="POST" >
                        {{ csrf_field() }}
                        <form>
                          <div class="col-6 mb-3">
                            <label for="Name" class="form-label">AccountID:</label>
                            <input type="name" name ="AccountID" class="form-control" id="exampleInputEmail1" >
                          </div>
                          <div class="col-6 mb-3">
                            <label for="Name" class="form-label">transaction date:</label>
                            <input type="date" name ="TransactionDate" class="form-control" id="exampleInputEmail1" >
                          </div>
                          <div>
                            <label for="subform-type">Pilih Jenis transaksi:</label>
                            <select  id="DebitCreditStatus"  onchange="tampilkanDeskripsi1()" name="DebitCreditStatus">

                                <option value="">jenis transaksi</option>
                                <option value="C">credit</option>
                                <option value="D">debit</option>
                            </select>
                           </div>
                           <br>
                          <div >
                            <label  id="deskripsi"  for="Name">deskripsi:</label>
                            <select name="deskripsi" id="deskripsicredit" style="display:none">
                                <option value="setor Tunai">Setor Tunai</option>
                            </select>
                            <select name="deskripsi" id="deskripsidebit" style="display:none">
                                <option value="tarik tunai">tunai Tunai</option>
                                <option value="beli listrik">beli listrik</option>
                                <option value="beli pulsa">beli pulsa</option>
                            </select>
                           </div>
                           <br>
                          <div class="col-6 mb-3">
                            <label for="Name" class="form-label">Amount</label>
                            <input type="name" name ="amount" class="form-control" id="exampleInputEmail1" >
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
</body>
<script>
    function tampilkanDeskripsi1() {
        var s = document.getElementById("DebitCreditStatus").value;
       
        var optioncredit = document.getElementById("deskripsicredit");
        var optiondebit = document.getElementById("deskripsidebit");
        if (s === ""){
            optiondebit.style.display = "none";
            optioncredit.style.display = "none";
        }
        if (s === "D"){
            optiondebit.style.display = "inline";
            optioncredit.style.display = "none";
        }
        if (s === "C"){
        
            optioncredit.style.display = "inline";
            optiondebit.style.display = "none";
        }
    }




</script>
</html>

@endsection


