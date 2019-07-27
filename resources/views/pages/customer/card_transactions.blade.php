@extends('layouts.customer.master')

@section('title', 'Card Transactions')

@section('content')

<div class="row">              
    <div class="col-md-12 h6">
        
    </div>      
    <div class="col-md-12">

        <div class="row"> 
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="border-radius:10px !important">
                    {{-- Transaction Table --}}
                    
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Transactions</h4>
                                    <h6 class="card-subtitle">&nbsp;</h6>
                                
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Transaction Code</th>
                                                    <th scope="col">Narration</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($cardTransactions as $cardTransaction)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>
                                                            <div title="{{ $cardTransaction->created_at->format('l jS \\of F Y h:i:s A') }}"> 
                                                                {{ $cardTransaction->created_at->format('d/m/Y') }}
                                                            </div>
                                                        </td>
                                                        <td>{{ $cardTransaction->card->currency->symbol." ".$cardTransaction->amount }}</td>
                                                        {{-- <td>{{ $cardTransaction->card_type->currency->symbol." ".$cardTransaction->amount }}</td> --}}
                                                        <td>{{ $cardTransaction->transaction_code }}</td>
                                                        <td>{{ ucfirst($cardTransaction->narration) }}</td>
                                                        <td>

                                                            @if($cardTransaction->type == "credit")
                                                                <span class="btn btn-sm btn-success"> <i class="mdi mdi-debug-step-into"></i> {{ ucfirst($cardTransaction->type) }} </span>
                                                            @elseif($cardTransaction->type == "debit")
                                                                <span class="btn btn-sm btn-danger"> <i class="mdi mdi-debug-step-out"></i> {{ ucfirst($cardTransaction->type) }} </span>
                                                            @else

                                                            @endif

                                                        </td>
                                                        <td>

                                                            @if($cardTransaction->status == "successful")
                                                                <span class="text-success"> <i class="mdi mdi-check-all"></i> {{ ucfirst($cardTransaction->status) }} </span>
                                                            @elseif($cardTransaction->status == "pending")
                                                                <span class="text-warning"> <i class="mdi mdi-clock"></i> {{ ucfirst($cardTransaction->status) }} </span>
                                                            @elseif($cardTransaction->status == "failed")
                                                                <span class="text-danger"> <i class="mdi mdi-close"></i> {{ ucfirst($cardTransaction->status) }} </span>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                                @if(count($cardTransactions) == 0)
                                                    <tr>
                                                        <td colspan="7" class="span4 text-center text-muted"> No Transaction Found</td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="float-right">
                                            {{ $cardTransactions->links() }}
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection

@section('custom-script')

<script>

     $('.collapse').collapse()

</script>

@endsection