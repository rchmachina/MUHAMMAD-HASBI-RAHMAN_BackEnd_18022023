@extends('layout')
@section('isi')
<body>

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
              <h5 class="card-title">Data nasabah</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">                
              <div class="container">
                <div class="col-md">
	<a class="btn btn-outline-primary"  href="/tambahnasabah"> + Tambah data nasabah</a>
	<a class="btn btn-outline-primary"  href="/tambahtransaksi"> + Tambah data transaksi </a>
	<a class="btn btn-outline-primary"  href="/liatpoint"> liat point </a>
	<br>
	
	<br>
	<br>
	<h2>data nasabah</h2>
	<div class="container">
		<div class="col-lg-4 d-flex align-items-center justify-content-center">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama</th>
				</tr>
				</thead>
				<tbody>
					@foreach($user as $u)
					<tr>
						<th scope="col">{{ $u->AccountID}}</th>
						<td scope="col">{{ $u->userName}}</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>



	<br>
	<br>
	<h2>cetak data transaksi</h2>
	<div class="container">
		<div class="col-md">
			<form method="get" action="/caritransaksi">
				{{ csrf_field() }}
				<label for="id">ID:</label>
				<input type="name" name="AccountID" id="">

				<label for="start_date">Start Date:</label>
				<input type="date" name="start_date" id="start_date">
			  
				<label for="end_date">End Date:</label>
				<input type="date" name="end_date" id="end_date">
			  
				<button type="submit">Search</button>
			  </form>
		</div>
	  </div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>


</body>
	@endsection('isi')

</html>
