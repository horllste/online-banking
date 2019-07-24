@extends('layouts.customer.master')

@section('title', 'Account Transactions')

@section('content')

<div class="row">              
    <div class="col-md-12 h6">
        
    </div>      
    <div class="col-md-12">
        <div class="row"> 
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="border-radius:10px !important">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Account Details
                                </button>
                                </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-7">
                                                    <div>Bank Name.</div>
                                                    <div class="h6">{{ $bankAccount->bank->name }} {{ $bankAccount->bank_location->name }}</div>
                    
                                                    <div>Account Name.</div>
                                                    <div class="h6">{{ $bankAccount->number }}</div>
                                                    
                                                    <div>Account No.</div>
                                                    <div class="h6">{{ $bankAccount->name }}</div>
                    
                                                </div>
                                                <div class="col-sm-12 col-md-5 text-right">
                                                    @if(!empty($bankAccount->bank->picture))
                                                        <img src="{{ $bankAccount->bank->picture }}" alt="{{ $bankAccount->bank->name }}" class="rounded-circle bg-theme" width="50" height="50">
                                                    @endif
                    
                                                    <br/>
                                                    <br/>
                    
                                                    <div>Ledger Balance.</div>
                                                    <div class="h6 text-muted">{{ $bankAccount->bank_location->currency->symbol }} {{ $bankAccount->ledger_balance }}</div>
                    
                                                    <div>Available Balance.</div>
                                                    <div class="h6">{{ $bankAccount->bank_location->currency->symbol }} {{ $bankAccount->ledger_balance }}</div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

                                                @foreach ($bankTransactions as $bankTransaction)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>
                                                            <div title="{{ $bankTransaction->created_at->format('l jS \\of F Y h:i:s A') }}"> 
                                                                {{ $bankTransaction->created_at->format('d/m/Y') }}
                                                            </div>
                                                        </td>
                                                        <td>{{ $bankAccount->bank_location->currency->symbol." ".$bankTransaction->amount }}</td>
                                                        <td>{{ $bankTransaction->transaction_code }}</td>
                                                        <td>{{ ucfirst($bankTransaction->narration) }}</td>
                                                        <td>

                                                            @if($bankTransaction->type == "credit")
                                                                <span class="btn btn-sm btn-success"> <i class="mdi mdi-debug-step-into"></i> {{ ucfirst($bankTransaction->type) }} </span>
                                                            @elseif($bankTransaction->type == "debit")
                                                                <span class="btn btn-sm btn-danger"> <i class="mdi mdi-debug-step-out"></i> {{ ucfirst($bankTransaction->type) }} </span>
                                                            @else

                                                            @endif

                                                        </td>
                                                        <td>

                                                            @if($bankTransaction->status == "successful")
                                                                <span class="text-success"> <i class="mdi mdi-check-all"></i> {{ ucfirst($bankTransaction->status) }} </span>
                                                            @elseif($bankTransaction->status == "pending")
                                                                <span class="text-warning"> <i class="mdi mdi-clock"></i> {{ ucfirst($bankTransaction->status) }} </span>
                                                            @elseif($bankTransaction->status == "failed")
                                                                <span class="text-danger"> <i class="mdi mdi-close"></i> {{ ucfirst($bankTransaction->status) }} </span>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                                @if(count($bankTransactions) == 0)
                                                    <tr>
                                                        <td colspan="7" class="span4 text-center text-muted"> Nothing Found</td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="float-right">
                                            {{ $bankTransactions->links() }}
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