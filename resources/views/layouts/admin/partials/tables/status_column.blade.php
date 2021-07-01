@if($statusValue == 1)
    <span class="label label-lg font-weight-bold label-light-success label-inline">
        {{__('main.status_enable')}}</span>
@else
    <span class="label label-lg font-weight-bold label-light-danger label-inline">
        {{__('main.status_disable')}}</span>
@endif
