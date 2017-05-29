@extends('layout.master')
@section('title','Invoice')
@section('content')
<div class="container">
  <div class="section">
    <form method="post" action="<?= URL::to('search')?>">
      {{ csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="field is-grouped">
          <p class="control">
            <input class="input" type="text" id="search" name="search" placeholder="Search">
          </p>
          <p class="control"> 
            <button class="button is-info" type="submit" id="search">Search</button>
          </p>
          <a class="button is-primary is-right" href={{url('/add')}}> + Add Invoice</a>
      </div>
    </form><br>
    <div class="container">
      <table class="table is-bordered is-striped">
        <thead>
          <tr>
            <th>Invoice Name</th>
            <th>#of Items</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
        <tr>
          <td><a href="{{URL::to('/edit/'.$invoice->id)}}">{{$invoice->invoice_name}}</a></td>
          <td>{{$invoice->no_inv_items}}</td>
          <td>{{ $invoice->total()}}</td> 
          <form method="post" action="<?= URL::to('delete/'.$invoice->id)?>">
            {{ csrf_field()}}
            {{method_field('DELETE')}}
            <td>
              <a class="button is-primary" href="{{URL::to('/pdfview/'.$invoice->id) }}">PDF</a> 
              <button class="button is-primary" type="submit" value="delete">Remove</button>
            </td> 
          </form>  
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div style="width:100px;" >
      {{$invoices->links()}}
    </div>
  </div>
</div>
@endsection