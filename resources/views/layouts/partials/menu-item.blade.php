@if ($hijo->cChildMenu == 0)
    <a class="collapse-item text-wrap" href="/{{ $hijo->cUrlMenu }}">{{ $hijo->cItemMenu }}</a>
@else
    <a class="collapse-item text-wrap" href="#" data-toggle="collapse" data-target="#ID{{ $item->cIdMenu }}"
        aria-expanded="true" aria-controls="ID{{ $item->cIdMenu }}">{{ $item->cItemMenu }}</a>
    <div id="ID{{ $item->cIdMenu }}" class="collapse show" aria-labelledby="headingTwo"
        data-parent="#ID{{ $item->cIdMenu }}">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ $item->cItemMenu }}:</h6>
            @foreach ($item->hijos as $hijo)
                @include('layouts.partials.menu-item', ['item' => $hijo])
            @endforeach
        </div>
    </div>
@endif
