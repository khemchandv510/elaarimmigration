<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>
    
   <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Users') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('Category.show') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Categories') }}
        </a>
    </li> 

    <li class="nav-item">
        <a class="nav-link" href="{{ route('Category.showSubCategory') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Sub category') }}
        </a>
    </li> 

    <li class="nav-item">
        <a class="nav-link" href="{{ route('Category.showSubSubCategory') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Sub sub category') }}
        </a>
    </li> 

    <li class="nav-item">
        <a class="nav-link" href="{{ route('product.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Products') }}
        </a>
    </li> 
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('blog.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Blogs') }}
        </a>
    </li> 
    
     <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('News') }}
        </a>
    </li> 
    

    <li class="nav-item">
        <a class="nav-link" href="{{ route('clients.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Clients') }}
        </a>
    </li> 
    
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('card.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Home page card') }}
        </a>
    </li>
    
    

    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="{{ url('imports') }}">-->
    <!--        <svg class="nav-icon">-->
    <!--            <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>-->
    <!--        </svg>-->
    <!--        {{ __('Imports') }}-->
    <!--    </a>-->
    <!--</li>-->

    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="{{ url('smtp-config') }}">-->
    <!--        <svg class="nav-icon">-->
    <!--            <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>-->
    <!--        </svg>-->
    <!--        {{ __('Smtp configuration') }}-->
    <!--    </a>-->
    <!--</li>-->



    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="{{ url('send-email') }}">-->
    <!--        <svg class="nav-icon">-->
    <!--            <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>-->
    <!--        </svg>-->
    <!--        {{ __('Send test mail') }}-->
    <!--    </a>-->
    <!--</li>-->
    
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="{{ url('send-emails') }}">-->
    <!--        <svg class="nav-icon">-->
    <!--            <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>-->
    <!--        </svg>-->
    <!--        {{ __('Send  mails') }}-->
    <!--    </a>-->
    <!--</li>-->


    

    
</ul>