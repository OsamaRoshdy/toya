@extends('layouts.admin.app', ['title' => $module,'model' => $module, 'action' => 'create'])
@section('content')

    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        @component('backend.shared.component.form_action')@endcomponent
            <div class="card-body">
                <!--begin::Form-->
                {!! Form::model($role,['route'=> ['dashboard.' . $module .'.update', $role->id], 'method'=>'patch','id'=>'kt_form', 'files' => false]) !!}
                <div class="row">
                    <div class="col-xl-8">
                        <div class="my-5">
                            @include('backend.' . $module . '.form')
                            <div class="form-group row">
                                {{ Form::label('name', __('main.roles'), ['class' => 'col-3']) }}
                                <div class="col-9">
                                    <div class="card card-custom">
                                        <div class="card-header card-header-tabs-line">
                                            <div class="card-toolbar">
                                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                    @foreach($permissions as $key => $value)
                                                        <li class="nav-item">
                                                            <a class="nav-link {{  $key == 'admins'? 'active' : '' }}" data-toggle="tab" href="#{{$key}}">
                                                                <span class="nav-text">{{ __('main.'. $key) }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                @foreach($permissions as $key => $value)
                                                    <div class="tab-pane {{  $key == 'admins' ? 'show active' : '' }} fade" id="{{ $key }}" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
                                                        <div class="col-form-label">
                                                            <div class="checkbox-inline">
                                                                @foreach($value as $permission)
                                                                    <label class="checkbox checkbox-success">
                                                                        <input type="checkbox" value="{{ $permission . '_' . $key }}" name="permissions[]" {{ $role->hasPermissionTo($permission . '_' . $key) ? 'checked' : '' }}>
                                                                        <span></span>{{ __('main.' . $permission) }} {{ __('main.' . $key) }}
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has("permissions"))
                                        <span class="form-text text-danger">{{$errors->first("permissions")}}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-1"></div>
                    <div class="col-xl-3">
                        @component('backend.shared.component.form_status')@endcomponent
                    </div>
                </div>
            {!! Form::close() !!}
            <!--end::Form-->
            </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('backend/assets/js/pages/custom/user/edit-user.js?v=7.2.6') }}"></script>
@endsection
