
<nav class="userNavbar">
    <div>
        <ul>
            <li><a href="{{route('user.index')}}">Profile</a></li>
            <li><a href="{{route('sedcard.list')}}">SedCard list</a></li>
            <li><a href="{{route('user.create')}}">Create SedCard</a></li>
            <li><a href="{{route('user.show',Auth::user()->id)}}">Group list</a></li>
        </ul>
    </div>
</nav>