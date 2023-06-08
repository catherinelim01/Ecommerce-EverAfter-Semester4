<form class="form-inline" action="{{ route('shop.search') }}" method="POST">
    @csrf
    <input class="form-control mr-sm-2 search" type="search" name="searching" placeholder="Search" aria-label="Search" />
    <button class="btn search-switch" type="submit"><i class="ti-search"></i></button>
</form>
