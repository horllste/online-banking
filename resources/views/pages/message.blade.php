@extends('layouts.master')

@section('title', 'Message Center')


@section('custom-style')

<style>

.dot {
  height: 20px;
  width: 20px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}  
  
.sortable tr {
    cursor: pointer;
}

</style>

@endsection

@section('content')

<div class="row">    

    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card" style="border-radius:10px !important">
            {{-- Messages Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="card-title mt-2 mb-4 p-3"> <a href="{{ route('send_message') }}" class="btn btn-primary float-right">Compose</a> </h4>
                        
                        
                        <div class="mt-5">
                            <table class="table sortable">
                                <tbody>

                                    @foreach ($messages as $message)
                                        @if($message->status == "unread")
                                            <tr class="table-light row" onclick="window.location='{{ route('read_message',$message->id) }}';">
                                        @else
                                            <tr class="table-active row" onclick="window.location='{{ route('read_message',$message->id) }}';">
                                        @endif
                                            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                            <td class="col-2">{{ $message->sender->fullname }}</td>
                                            <td class="col-8">{!! $message->messagePreview !!}</span> </td>
                                            <td class="text-muted col-2" title="{{ $message->created_at->format('l jS \\of F Y h:i:s A') }}">
                                                {{ $message->created_at->diffForHumans() }}
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    
                                    @if(count($messages) == 0)
                                        <tr>
                                            <td colspan="3" class="span4 text-center text-muted"> No Messages Found</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="float-right">
                            {{ $messages->links() }}
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


</script>

@endsection