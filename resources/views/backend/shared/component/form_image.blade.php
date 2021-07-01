<div class="form-group row">
    <label class="col-form-label col-3 text-lg-right text-left">{{ __('main.image') }}</label>
    <div class="col-9">
        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url({{ $image_path ?? asset('backend/assets/media/users/100_1.jpg') }})">
            <div class="image-input-wrapper"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="{{ $name ?? 'image' }}" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="image">
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
        @if ($errors->has($name ?? 'image' ))
            <span class="form-text text-danger">{{$errors->first($name ?? 'image' )}}</span>
        @endif
    </div>
</div>
