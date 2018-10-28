<footer class="text-muted">

    <div class="container-fluid dark-bg pt-4 pb-4">

        <div class="container mono">
            <p>&copy; {{ now()->year }} Tinybot. All rights reserved.</p>
            @if (Auth::check())
                <p>Logged in: TRUE - {{ Auth::user()->name }}</p>
            @else
                <p>Logged in: FALSE</p>
            @endif

            <p>
                Timezone: {{ date_default_timezone_get() }}
            </p>
            
            <p>
                {{-- Need to look at tutorial vid for view controller thing so that this can be passed to footer on any page  --}}
                {{-- IP: {{ $geoplugin['geoplugin_credit'] }} --}}
                IP Address: {{ request()->ip() }}
            </p>

            <p>
                Application Version: 2.0.0
            </p>

        </div>
        
    </div>

</footer>
