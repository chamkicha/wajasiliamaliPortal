
    <ul class="side-menu">
        <li><h3>Menu</h3></li>

        @if(in_array('dashibodi' ,permissions()))
        <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="{{ url('/dashboard') }}"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Dashibodi</span></a>
        </li>
        @endif

        @if(in_array('mwanachama' ,permissions()))
        <li class="slide">
            <a class="side-menu__item text_nowrap"  data-toggle="slide" href="{{ url('/members') }}"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Mwanachama</span></a>
        </li>
        @endif

        @if(in_array('vikundi' ,permissions()))
        <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="{{ url('/Vikundi') }}"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Vikundi</span></a>
        </li>
        @endif

        @if(in_array('vyama' ,permissions()))
        <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="{{ url('/Shirikisho') }}"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Vyama</span></a>
            
        </li>
        @endif

        
        @if(in_array('sekta-ya-vyama' ,permissions()))
        <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="{{ url('/MakundiWizara') }}"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Sekta za Vyama</span></a>
            
        </li>
        @endif

        

        
        @if(in_array('masoko' ,permissions()))
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Masoko / Maeneo</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ url('/masoko') }}" class="slide-item">Masoko</a></li>
                <li><a href="{{ url('/vizimba') }}" class="slide-item">Maeneo / vizimba</a></li>
            </ul>
        </li>
        @endif
        
        @if(in_array('ripoti' ,permissions()))
        <li><h3>Ripoti</h3></li>
        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Ripoti</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ url('/reports/reportWanachama') }}" class="slide-item">Ripoti ya Wanachama</a></li>
                <li><a href="{{ url('/reports/reportVikundi') }}" class="slide-item">Ripoti ya Vikundi</a></li>
                {{--  <li><a href="{{ url('/reports/reportShirikisho')}}" class="slide-item">Ripoti ya Vyama</a></li>  --}}
                <li><a href="{{ url('/reports/mapato')}}" class="slide-item">Ripoti ya Mapato</a></li>
                <li><a href="{{ url('/reports/mikopo')}}" class="slide-item">Ripoti ya Mikopo</a></li>
            </ul>
        </li>
        @endif
        
        
        @if(in_array('mipangilio' ,permissions()))
        <li><h3>Mipangilio</h3></li>
        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-angle-double-right"></i><span class="side-menu__label">Mipangilio</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ url('/fees') }}" class="slide-item">Ada Za Mwanachama</a></li>
                <li><a href="{{ url('/durations') }}" class="slide-item">Muda Wa Ada</a></li>
                <li><a href="{{ url('/applications') }}" class="slide-item">Aina za Maombi</a></li>
                <li><a href="{{ url('/BusinessType') }}" class="slide-item">Aina ya Biashara</a></li>
                <li><a href="{{ url('/disabilities') }}" class="slide-item">Hali ya Kimwili</a></li>
                <li><a href="{{ url('/educations') }}" class="slide-item">Ngazi ya Elimu</a></li>
                <li><a href="{{ url('/ranks') }}" class="slide-item">Vyeo</a></li>
                <li><a href="{{ url('/users')}}" class="slide-item"> Watumiaji</a></li>
                <li><a href="{{ url('/roles')}}" class="slide-item"> Majukumu</a></li>
                <li><a href="{{ url('/permissions')}}" class="slide-item"> Ruhusa</a></li>
            </ul>
        </li>

        @endif
        
    </ul>