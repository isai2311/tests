@foreach ($menu as $item)
    @if ($item->cChildMenu == 0)
        <li class="nav-item {{ request()->is($item->cUrlMenu) ? 'active' : '' }}">
            <a class="nav-link" href="/{{ $item->cUrlMenu }}">
                <i class="{{ $item->cNomIcoMenu }} ?? far fa-circle"></i>
                <span>{{ $item->cItemMenu }}</span></a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ID{{ $item->cIdMenu }}"
                aria-expanded="true" aria-controls="ID{{ $item->cIdMenu }}">
                <i class="{{ $item->cNomIcoMenu }} ?? far fa-circle"></i>
                <span>{{ $item->cItemMenu }}</span>
            </a>
            <div id="ID{{ $item->cIdMenu }}" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ $item->cItemMenu }}:</h6>
                    <!-- Aqui empieza el recorrido de los hijos-->
                    @if (count($item->hijos) > 0)
                        @foreach ($item->hijos as $hijo)
                            @include('layouts.partials.menu-item', ['item' => $hijo])
                        @endforeach
                    @else
                        <!-- No existen hijos en el menu -->
                    @endif
                </div>
            </div>
        </li>
    @endif
@endforeach

