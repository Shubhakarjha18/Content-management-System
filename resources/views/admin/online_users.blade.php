<!-- In your view file -->
<?php 
$users = App\Models\User::whereNotNull('last_activity')
            ->orderBy('last_activity','desc')->get();

?>

<div class="container">
    <h2>Online Users</h2>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $user->image) }}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
                <ul>
                    <li>{{ \Carbon\Carbon::parse($user->last_activity)->diffForHumans() }}</li>
                    <li>
                        @if(Cache::has('user-is-online-'.$user->id))
                            <span class="text-center"><font color="green">Online</font></span>
                        @else
                            <span class="text-center"><font color="red">Offline</font></span>
                        @endif
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
</div>