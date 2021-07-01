<div class="card-header" style="z-index: 90; top: 119px; left: 440px; right: 175px;">
    <div class="card-title">
        <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-sm"></i>{{ __('main.back') }}</a>
    </div>
    <div class="card-toolbar">
        <button type="button" class="btn btn-success mr-2" id="submitButton">
            <i class="fa fa-plus"></i>
            {{ __('main.' . strtolower('save')) }}
        </button>
    </div>
</div>
