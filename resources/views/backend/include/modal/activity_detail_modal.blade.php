{{-- <a id='detail-btn' type="button" class="btn btn-default" href="{{ route('activity.show', $events->id) }}" hidden>
    Launch Extra Large Modal
</a> --}}

<a id='modal-btn' type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl" hidden>
    Launch Extra Large Modal
</a>

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
