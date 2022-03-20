<div>
    @if(app()->environment('local'))
        <div class="position-absolute" style="right: 0;bottom:0;">
            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle"
                        style="border-radius: 50%;height:38px;width:38px;"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-lock"></i>
                </button>
                <div class="dropdown-menu dropdownmenu-info" style="">
                    @foreach($data as $user)
                        <a role="button"
                           wire:click="login({{$user['key']}})"
                           class="dropdown-item">
                            {!! $user['label'] !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
