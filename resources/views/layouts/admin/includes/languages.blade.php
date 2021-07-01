<div class="dropdown">
    <!--begin::Toggle-->
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
            <img class="h-20px w-20px rounded-sm" src="{{ asset('backend/assets/media/svg/flags/' . app()->getLocale() .'.svg') }}" alt="">
        </div>
    </div>
    <!--end::Toggle-->
    <!--begin::Dropdown-->
    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
        <!--begin::Nav-->
        <ul class="navi navi-hover py-4">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="navi-item">
                    <a class="navi-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('backend/assets/media/svg/flags/' . $localeCode .'.svg') }}" alt="">
                        </span>
                        <span class="navi-text">{{ $properties['native'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Dropdown-->
</div>
