@if (session('success'))
    <div id="message-popup" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Done!</strong> {{ session('success') }}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif 
