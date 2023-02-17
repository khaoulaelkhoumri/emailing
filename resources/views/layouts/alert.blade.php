
    @if (session()->has('alert'))
    @php
        switch(session()->get('alert')['type']){
            case 'success' : $icon = 'mdi-check-all'; break;
            case 'danger' : $icon = 'mdi-alert-outline'; break;
            case 'info' : $icon = 'mdi-alert-circle-outline'; break;
            default : $icon = ''; break;
        }
    @endphp
    <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="padding-left: 35px;">
                <div class="alert alert-{{session()->get('alert')['type']}} alert-dismissible fade show" role="alert">
                        {{session()->get('alert')['message']}} 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif