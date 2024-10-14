@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@if ($errors->any())
    <script>
        alert("{{ implode('\\n', $errors->all()) }}");
    </script>
@endif