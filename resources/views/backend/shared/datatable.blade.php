@extends('layouts.admin.app', ['title' => $module,'model' => $module, 'action' => false])
@section('style')
    <link href="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="card card-custom card-custom gutter-t">
        <div class="card-header py-3">
            <div class="card-title">
                <h3 class="card-label">{{ __('main.' . $module) }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('dashboard.' . $module . '.create') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                    {{ __('main.new_record') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div id="kt_datatable2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                {!!
                   $html->table()
                !!}

            </div>
            <!--end: Datatable-->
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/crud/datatables/search-options/advanced-search.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/features/miscellaneous/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/modules.js')}}" type="text/javascript"></script>
    {!! $html->scripts() !!}
@endsection
