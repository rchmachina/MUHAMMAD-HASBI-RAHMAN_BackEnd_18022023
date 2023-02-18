@extends('layout')
@section('isi')
<body>
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
	<a class="btn btn-outline-primary"  href="/"> datanasabah </a>
	<div class="container">
		<div class="col-lg-4 d-flex align-items-center justify-content-center">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nama</th>
					<th scope="col">Point</th>
				</tr>
				</thead>
				<tbody>
					@foreach($user as $u)
					<tr>
						<th scope="col">{{ $u->AccountID}}</th>
						<td scope="col">{{ $u->userName}}</td>
						<td scope="col">{{ $u->Points}}</td>
					</tr>
					@endforeach

				</tbody>
			</table>
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
