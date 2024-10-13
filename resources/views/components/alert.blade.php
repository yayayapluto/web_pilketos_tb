<script>
    @if (session('error'))
        alert('{{ session('error') }}');
    @endif

    @if (session('success'))
        alert('{{ session('success') }}');
    @endif

    @if ($errors->any())
        alert('Errors:\n{{ implode('\n', $errors->all()) }}');
    @endif
</script>
