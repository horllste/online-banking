@extends('layouts.customer.master')

@section('title', 'Credit Cards')


@section('custom-style')

<style>

            /* entire container, keeps perspective */
    .flip-container {
        perspective: 1000px;
    }

    /* flip the pane when hovered */
    .flip-container:hover .flipper, .flip-container.hover .flipper {
        transform: rotateY(180deg);
    }

    .flip-container, .front, .back {
        width: 100%;
        height: 300px;
    }

    /* flip speed goes here */
    .flipper {
        transition: 0.6s;
        transform-style: preserve-3d;

        position: relative;
    }

    /* hide back of pane during swap */
    .front, .back {
        backface-visibility: hidden;

        position: absolute;
        top: 0;
        left: 0;
    }

    /* front pane, placed above back */
    .front {
        z-index: 2;
        /* for firefox 31 */
        transform: rotateY(0deg);

    }

    /* back, initially hidden pane */
    .back {
        transform: rotateY(180deg);
    }


    .bg-card{
        background: #4CA1AF;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #C4E0E5, #4CA1AF);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #C4E0E5, #4CA1AF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .bg-card-mastercard{
        background: #f46b45;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #eea849, #f46b45);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #eea849, #f46b45); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
    }

    .bg-card-visa{
        background: #1e3c72;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2a5298, #1e3c72);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2a5298, #1e3c72); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
    }

</style>

@endsection

@section('content')

<div class="row">              
    <div class="col-md-12 h6">
        Cards
    </div>   
       

    <div class="col-md-12">
        <div class="row">
            @foreach ($cards as $card)
            
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">

                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                            <div class="front">
                                <!-- front content -->
                                <div class="card {{ $card->card_type->style }}" style="border-radius:10px !important">
                                    <div class="card-body">
                                        {{-- Card Balance --}}
                                        <div class="text-right h5 mt-2"> {{ $card->currency->symbol." ".$card->available_balance }}</div>
                                        {{-- Card Number Part --}}
                                        <div class="text-center h5 m-4 mt-5" style="letter-spacing: 5px;"> {!! $card->formatednumber !!}</div>
                                        <div class="m-4 mt-5 mb-2">
                                            {{-- Bottom Part of the card --}}
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <p class="font-weight-lighter align-middle small">VALID<br/>TILL</p>
                                                        </div>
                                                        <div class="col-10 font-weight-bold">
                                                            {{ $card->month." / ".$card->year }}
                                                        </div>
                                                    </div>
                                                    <p class="h5" style="letter-spacing: 5px;">{{ strtoupper($card->name) }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{ $card->card_type->picture }}" class="img-thumbnail" />
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                            <div class="back">

                                <!-- back content -->

                                <div class="card {{ $card->card_type->style }}" style="border-radius:10px !important">
                                    <div class="card-body">
                                        {{-- Card Balance --}}
                                        <div class="text-right h5 mt-2"> &nbsp; </div>
                                        {{-- Card Number Part --}}
                                        <div class="m-4 mt-2">
                                            <p class="text-right text-white small mr-4">CVV</p>
                                            <div class="card rounded p-2">
                                                <div class="row">
                                                    <div class="text-muted col-10"> {{ $card->card_type->name }} </div>
                                                    <div class="text-dark font-weight-bold col-2"> {{ $card->cvv }} </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-4 mt-5 mb-2">
                                            {{-- Bottom Part of the card --}}
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <p class="font-weight-lighter align-middle small"> &nbsp; </p>
                                                        </div>
                                                        <div class="col-10 font-weight-bold">
                                                                &nbsp;
                                                        </div>
                                                    </div>
                                                    <p class="h5" style="letter-spacing: 5px;"> &nbsp; </p>
                                                </div>
                                                <div class="col-2">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <a href="{{ route('card_transactions', $card->id) }}" class="btn btn-sm btn-primary rounded">Transactions</a>
                    </div>

                </div>
    
            @endforeach
        </div>
        <div class="float-right">
            {{ $cards->links() }}
        </div>
    </div>
</div>
     



@endsection

@section('custom-script')

<script>


</script>

@endsection