<html>
<head>
<style>
@media screen
{    
  .ticket {
    font-size: 10px;
    display: inline-block;
    text-align: center;
    width: 200px;
    border: dotted;
    margin: 4px 2px;
    padding: 4px 2px;
  }
  .title {
    text-align: center;
  }
  .search {
    text-align: center;
  }
  .print-button {
    text-align: center;
    margin-bottom: 10px;
  }
}
@media print
{    
  .ticket {
    font-size: 10px;
    display: inline-block;
    text-align: center;
    width: 200px;
    border: dotted;
    margin: 4px 2px;
    padding: 4px 2px;
  }
  .title {
    text-align: center;
  }
  .search {
    text-align: center;
  }
  .no-print, .no-print *
  {
      display: none !important;
  }
}
</style>
</head>
<div class="container">
  <h3 class="title">{{ $raffle['name'] }} -- {{ $tickets->reduce(function ($acc,$ticket) {return $acc+$ticket['quantity'];})  }} Tickets</h3>
  <div class="search">
    <form method="POST" action="{{  route('raffles.tickets.index',['raffle' => $raffle['id']])  }}">
    @csrf
    <label for="begin-date">Begin Date</label>
    <input type="date" name="begin" id="begin-date" @isset($begin) value="{{ $begin }}" @endisset required=true>
    <label for="end-date">End Date</label>
    <input type="date" name="end" id="end-date" @isset($end) value="{{ $end }}" @endisset required=true>
    <button type="submit">Search</button>
    </form>
  </div>
  <div class="no-print print-button" ><button onClick="window.print()">Print!</button></div>
    <div class="row justify-content-center">
  
      @foreach ($tickets as $ticket)
        @for ($number = 1; $number <= $ticket['quantity']; $number++)
          <div class="ticket">
            <div>{{ $ticket->raffleItem['name']  }}</div>
            <div>{{ $ticket->purchase['name']  }}</div>
            <div>{{ $ticket['id'] }}-{{ $number  }}</div>
            <hr>
            <div>{{ $ticket->purchase['email']  }}</div>
            <div>{{ $ticket->purchase['phone']  }}</div>
            <div>{{ $ticket->purchase['contact_method']  }}</div>
          </div>
        @endfor
      @endforeach
    </div>
  </div>
</div>
</html>
