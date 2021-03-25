<div class="col-10 container paddings">
    <div class="header">
        <form action="" class="col-3 search">
            <input type="text" class="form-control" name="search" id="search" placeholder="Pojam">
            <input type="submit" class="btn btn-primary submit" value="Trazi">
        </form>
        <div class="col-3 logout">
            <ul class="user" id="user">
                <li class="">
                    <a href="" class="btn btn-outline-primary">{{ session()->get('user')->ime }} {{ session()->get('user')->prezime }} <img src="{{ asset('/') }}2x/icon.png" alt="" class="icon"></a>
                    <ul class="col-11 ul-lo">
                        {{-- <img src="{{ asset('/').session()->get('user')->picture }}" alt="" class="profile-pic"> --}}
                        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-settings">Game Zone</a>
                        <a href="{{ route('logout') }}" class="btn btn-primary btn-logout">Odjava</a>
                    </ul>
                </li>
            </ul>
        </div>
    </div>