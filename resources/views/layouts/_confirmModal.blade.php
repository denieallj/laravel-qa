<div class="modal" tabindex="-1" role="dialog" id="confirmModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>{{ $message }}</p>
            </div>

            <div class="modal-footer">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>