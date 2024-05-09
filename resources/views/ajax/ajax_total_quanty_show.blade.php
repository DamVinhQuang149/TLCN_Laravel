@if (Session::has('Cart') != null)
    {{ Session::get('Cart')->totalQuanty }}
@else
    0
@endif
