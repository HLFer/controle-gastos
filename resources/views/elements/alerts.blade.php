@if (Session::has('alert.type'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    switch (session('alert.type')) {
                        case 'success':
                            $class = 'alert-success';
                            break;
                        case 'info':
                            $class = 'alert-info';
                            break;
                        case 'warning':
                            $class = 'alert-warning';
                            break;
                        default:
                             $class = 'alert-danger';
                    }
                @endphp

                <div class="alert {{ $class }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    {{ session('alert.message') }}
                </div>
            </div>
        </div>
    </div>
@endif
