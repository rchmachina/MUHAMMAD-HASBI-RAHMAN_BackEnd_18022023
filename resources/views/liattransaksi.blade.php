

	 <h1>Search Results</h1>

<table>
  <thead>
    <tr>
		

      <th>akunID</th>
      <th>deskripsi</th>
      <th>tanggal transaksi</th>
      <th>credit</th>
      <th>debit</th>
	  
      <th>amount</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($results as $result)
      <tr>
        <td>{{ $result->AccountID }}</td>
        <td>{{ $result->Description }}</td>
        <td>{{ $result->TransactionDate }}</td>
        <td>
			@if ( ($result->DebitCreditStatus) == "C")
				{{ $result->amount}}
			@else
				-
			@endif</td>
        <td>
			@if ( ($result->DebitCreditStatus) == "D")
				{{ $result->amount}}
			@else
				-
			@endif</td>
        <td>{{ $result->amount }}</td>
      </tr>
    @endforeach
  </tbody>
</table>















