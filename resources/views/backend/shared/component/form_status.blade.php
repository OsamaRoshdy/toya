<div class="form-group row">
    <div class="col-9 col-form-label">
        <div class="radio-list">
            <label class="radio radio-outline radio-success">
                {{ Form::radio('status', 1, null,['checked'=>'checked']) }}
                <span></span>
                {{ __('main.status_enable')  }}
            </label>
            <label class="radio radio-outline radio-danger">
                {{ Form::radio('status', 0, null,[]) }}
                <span></span>
                {{ __('main.status_disable')   }}
            </label>
        </div>
    </div>
    @if ($errors->has("status"))
        <span class="form-text text-danger">{{$errors->first('status')}}</span>
    @endif
</div>
