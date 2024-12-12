<!DOCTYPE html>
<html>
<head>
    <title>Weather Data</title>
</head>
<body>
    @if($error)
        <h1>Error</h1>
        <p>{{ $error }}</p>
    @elseif($data)
        <h1>Weather in {{ $data['name'] }}</h1>
        <p>Temperature: {{ $data['main']['temp'] - 273.15 }}°C</p>
        <p>Weather: {{ $data['weather'][0]['description'] }}</p>
    @else
        <p>Data tidak tersedia.</p>
    @endif
</body>
</html>
