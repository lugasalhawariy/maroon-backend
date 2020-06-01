@extends('layouts.default')

@section('title', 'Calendar')

@push('after-style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endpush

@section('content')
    <div class="container mx-auto">
        <div class="wadah mx-auto" style="width: 90%;">
            <div class="calendar"></div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('.calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                    @foreach($items as $item)
                    {
                        color: 'maroon',
                        title : '{{ $item->title }}',
                        start : '{{ $item->start_activity }}',
                        end: '{{ $item->end_activity }}',
                        url : '{{ route('activities.edit', $item->id) }}'
                    },
                    @endforeach
                ]
            })
        });
    </script>
@endpush