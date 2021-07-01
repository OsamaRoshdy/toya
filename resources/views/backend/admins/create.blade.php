@extends('layouts.admin.app', ['title' => $module,'model' => $module, 'action' => 'create'])
@section('content')

    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        @component('backend.shared.component.form_action')@endcomponent
        <div class="card-body">
            <!--begin::Form-->
            {!! Form::open(['route'=>'dashboard.'. $module.'.store','id'=>'kt_form','method'=>'post', 'files' => true] ) !!}
            <div class="row">
                <div class="col-xl-8">
                    <div class="my-5">
                        @include('backend.' . $module . '.form')
                    </div>
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-3">
                    @component('backend.shared.component.form_status')@endcomponent
                    @component('backend.shared.component.form_image')@endcomponent
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
