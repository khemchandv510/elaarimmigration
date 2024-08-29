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
        <a class="nav-link" href="{{ route('email.group') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Categories') }}
        </a>
    </li> 
    

    <li class="nav-item">
        <a class="nav-link" href="{{ url('posts') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Templates ') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('emails') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Emails') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('imports') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Imports') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('smtp-config') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Smtp configuration') }}
        </a>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="{{ url('send-email') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Send test mail') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ url('send-emails') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Send  mails') }}
        </a>
    </li>


    

    
</ul>