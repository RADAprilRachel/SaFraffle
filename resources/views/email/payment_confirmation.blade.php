<html>
<head>
<title>Thank you for your donation</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
p {
  margin: 0.2em auto;
}
table {
  margin: 1em;
  border-collapse: collapse;
  border: 1px solid;
}
col {
  border: 1px solid;
}
tbody tr:nth-child(odd) {
  background: #ddd;
}
tfoot tr {
  background: #616c75;
  color: #dbc12e;
  padding: 8px 4px;
  border: 1px solid;
}
th {
  border: 1px solid;
  padding: 6px;
}
td {
  border-left: 1px solid;
  padding: 8px 4px;
  text-align: center;
}
</style>
</head>
<p>Hello, {{ $purchase->name }}, thank you for your donation to {{ $raffle->benefactor }}!</p>
<p>You are registered for the following:</p>
<table><thead><tr><th>Tickets</th><th>Item</th><th>provided by</th></thead>
@foreach ($tickets as $ticket)
@php $item = $raffle_items->find($ticket->raffle_item_id) @endphp
<tr><td>{{ $ticket->quantity }}</td><td>{{ $item->name }}</td><td>{{ $item->donor }}</td></tr>
@endforeach
</table>
<p>If you have any questions about the fundraiser please email our event coordinator: <a href="mailto:rachel.events.safaicoffee@gmail.com">Rachel</a></p>
<p>For any technical concerns or questions please contact our web developer: <a href="mailto:webmaster.safaicoffee@gmail.com">Radet 5</a> and reference your order ID: {{ $payment->paypal_custom_id }}</p>

<p>Thank you again, and good luck!</p>
<p>~Safai Coffee Shop Team</p>

</html>

