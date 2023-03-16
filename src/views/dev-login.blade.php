<div>
    @if(app()->environment('local'))
        <style>
            .dropdown-toggle.dev-login-dropdown::after {
                display: none;
            }
        </style>
        <div class="position-absolute" style="right: 0;bottom:0;">
            <div class="btn-group">
                <button type="button"
                        class="btn btn-info dropdown-toggle dev-login-dropdown p-0 m-0 d-flex align-items-center justify-content-center"
                        style="border-radius: 50%;height:38px;width:38px;"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                         width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z"/>
                    </svg>
                </button>
                <div class="dropdown-menu dropdownmenu-info" style="">
                    @forelse($data as $user)
                        <a role="button"
                           wire:click="login('{{$user['key']}}')"
                           class="dropdown-item text-nowrap">
                            @if(auth()->user()?->getKey() === $user['key'])
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     version="1.1" width="24" height="24" viewBox="0 0 24 24" class="d-inline">
                                    <path
                                        d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"/>
                                </svg>
                            @endif
                            <span class="d-inline">
                            {!! $user['label'] !!}
                            </span>
                        </a>
                    @empty
                        <span class="dropdown-item-text">No users found.</span>
                    @endforelse
                    @auth
                        <a role="button"
                           wire:click="logout"
                           class="dropdown-item text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 version="1.1" width="24" height="24" viewBox="0 0 24 24" class="d-inline">
                                <path
                                    d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z"/>
                            </svg>
                            <span class="d-inline">
                            Logout
                            </span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    @endif
</div>
