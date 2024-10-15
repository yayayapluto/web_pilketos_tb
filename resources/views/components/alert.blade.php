@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn-success'
            }
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ implode('\\n', $errors->all()) }}",
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn-error'
            }
        });
    </script>
@endif

<style>
    .btn-success {
        background-color: #4CAF50; /* Darker green */
        color: white;
    }

    .btn-error {
        background-color: #F44336; /* Darker red */
        color: white;
    }
</style>
