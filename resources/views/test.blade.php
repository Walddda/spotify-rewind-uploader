<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @foreach ($beats as $x)
            <p>This is Beat {{ $x->title}}</p>
        @endforeach
        <test-comp :beats="beats"></test-comp>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
