<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidates List</title>
</head>
<body>
    <x-alert />
    <ul>
        @if ($candidates->isEmpty())
            <li>Kosong</li>
        @else
            @foreach ($candidates as $c)
                <li>
                    <strong>{{ $c->name }}</strong>
                    <ul>
                        <li>
                            <img src="{{ asset('storage/' . $c->image) }}" alt="{{ $c->name }} Image" style="max-width: 200px; height: auto;">
                        </li>
                        <li>{{ $c->description }}</li>
                        <li><a href="{{ $c->external_link }}" target="_blank">{{ $c->external_link }}</a></li>
                    </ul>
                </li>
            @endforeach
        @endif
    </ul>
</body>
</html>
