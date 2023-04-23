<div {{ $attributes->merge(['class' => 'modal fade']) }} tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $message }}
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">{{ $cancelText }}</button>
                <button type="button" class="btn btn-danger text-white" id="{{ $id }}Confirm">{{ $confirmText }}</button>
            </div>
        </div>
    </div>
</div>
