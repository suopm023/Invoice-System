@extends('layout.master')
@section('title','Invoice')
@section('content')
<div class="container">
  <div class="section">
    <div class="field has-addons has-addons-right">
      <a href="<?= URL::to('/')?>"> Back </a>
    </div>
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
          <td>{{$invoice->total()}}</td>
          <td>
            <a href="{{URL::to('/pdfview/'.$invoice->id) }}">PDF</a>  
            <a href="{{URL::to('/delete/'.$invoice->id)}}">Remove</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection