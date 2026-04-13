{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <p>⚠️ Please correct the following errors:</p>
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const errorMessage = "{{ session('error') }}"; 

        Swal.fire({
            icon: "error",
            title: "Failed!",
            text: errorMessage,
            confirmButtonText: "Okay"
        });
    });
</script>
@endif

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const errorMessage = "{{ session('success') }}"; 

        Swal.fire({
            icon: "success",
            title: "Success!",
            text: errorMessage,
            confirmButtonText: "Okay"
        });
    });
</script>
@endif