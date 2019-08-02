@extends('layouts.master')

@section('title', 'Bank Accounts')

@section('content')

<div class="row">              
    <div class="col-md-12 h6">
        Accounts
    </div>   
       
    <div class="col-md-12">
        <div class="row">
            @foreach ($bankAccounts as $bankAccount)
            
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card" style="border-radius:10px !important">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    <div>Bank Name.</div>
                                    <div class="h6">{{ $bankAccount->bank->name }} {{ $bankAccount->bank_location->name }}</div>
                                    
                                    <br/>
    
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

                        <div class="progress" style="height: 3px;">
                            @if(!empty($bankAccount->deleted_at))
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            @else
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            @endif
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('account_history',$bankAccount->id) }}" class="btn btn-xs btn-primary"><i class="mdi mdi-cards"></i> Transactions </a>
                        </div>
                    </div>
                </div>
    
            @endforeach
        </div>
        <div class="float-right">
            {{ $bankAccounts->links() }}
        </div>
    </div>
</div>
     

@endsection

@section('custom-script')

<script>


</script>

@endsection