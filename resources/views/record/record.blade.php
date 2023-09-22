@foreach ($records as $record)
    {{ $record->specialist_id}}
    {{ $record->service_id}}
    {{ $record->datetime}}
@endforeach
