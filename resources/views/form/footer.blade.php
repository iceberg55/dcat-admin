<div class="box-footer">
    <div class="col">
        @if(! empty($buttons['submit']))
            <div class="float-end">
                <button class="btn btn-primary submit"><i class="fas fa-save"></i>&nbsp;{{ trans('admin.submit') }}</button>
            </div>

            @if($checkboxes)
                <div class="float-end d-md-flex" style="margin:10px 15px 0 0;display: none">{!! $checkboxes !!}</div>
            @endif

        @endif

        @if(! empty($buttons['reset']))
        <div class="float-start">
            <button type="reset" class="btn btn-warning"><i class="fas fa-rotate-left"></i>&nbsp;{{ trans('admin.reset') }}</button>
        </div>
        @endif
    </div>
</div>