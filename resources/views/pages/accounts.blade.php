@extends('layouts.master')

@section('title', 'Bank Accounts')

@section('content')

<div class="row">              
    <div class="col-md-12 h6">
        Accounts 

        @can('add-account')
            <button type="button" data-toggle="modal" data-target="#addBankAccountModal" class="btn btn-primary float-right"> Add Bank Account </button> 
        @endcan
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
     


@can('add-account')

{{-- Add The Model for the transaction adding --}}

<!-- Modal -->
<div class="modal fade" id="addBankAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <form method="POST" action="{{ route('add_bank_transaction') }}">
            @csrf
            <input type="hidden" value="{{ $bankAccount->id }}" name="bank_account_id" />

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Bank Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                
                    <div class="form-group">
                        <label for="transactionCodeInput">Account Name</label>
                        <input type="text" class="form-control" id="transactionCodeInput" aria-describedby="transactionCodeInputHelp" name="name" required />
                    </div>

                    <div class="form-group">
                        <label for="transactionNarrationInput">Account Number</label>
                        <input type="text" class="form-control" id="transactionNarrationInput" aria-describedby="transactionNarrationInputHelp" name="number" required />
                    </div>

                    <div class="form-group">
                        <label>Available Balance</label>
                        <input type="number" class="form-control" name="available_balance" required />
                    </div>

                    <div class="form-group">
                        <label>Ledger Balance</label>
                        <input type="number" class="form-control" name="ledger_balance" required />
                    </div>

                    <div class="form-group">
                        <label for="usersFormControlSelect">User</label>
                        <select class="form-control" id="usersControlSelect">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save </button>
                </div>
            </div>

        </form>

    </div>
</div>




@endcan


@endsection

@section('custom-script')

<script>


</script>

@endsection