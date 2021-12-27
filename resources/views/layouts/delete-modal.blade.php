<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete furniture?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary">
                    Yes I'm Sure
                </button>

                <button data-bs-dismiss="modal" class="btn btn-danger">
                    No I'm not sure
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    function deleteModal(id) {
        console.log(id)

    }
</script>