<div class="dropdown">
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <div class="btn  btn-clean btn-dropdown btn-lg mr-1">
            <img class="h-20px w-20px rounded-sm" src="{{ asset('backend/assets/media/users/osama.jpg') }}" alt="">
            {{ auth('admin')->user()->name }}
        </div>
    </div>
    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
        <ul class="navi navi-hover py-4">
            <li class="navi-item">
                <a href="#" class="navi-link">
                    <span class="navi-icon">
                        <i class="la la-user"></i>
                    </span>
                    <span class="navi-text">الملف الشخصي</span>
                </a>
            </li>
            <li class="navi-item">
                <a href="{{ route('dashboard.logout') }}" class="navi-link">
                    <span class="navi-icon">
                        <i class="la la-sign-out"></i>
                    </span>
                    <span class="navi-text">تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </div>
</div>
