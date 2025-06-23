@foreach ($menus as $menu)
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="80" class="card-img-top"
                style="height: 150px; object-fit: cover; border-radius: 5px;">
            <!-- Product details-->
            <div class="card-body p-2">
                <div class="">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{ $menu->name }}</h5>
                    <p class="text-left">
                    <p>{{ Str::limit($menu->description, 40) }}</p>
                    </p>
                    <!-- Product price-->
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Rp{{ number_format($menu->price, 0, ',', '.') }}</span>

                        {{-- @if ($stockData[$menu->id] < 1)
                            <span>Habis</span>
                        @else
                            <span>{{ $stockData[$menu->id] }}</span>
                        @endif --}}

                        @if ($menu->stock < 1 || $stockData[$menu->id] < 1)
                            <span>Habis</span>
                        @else
                            <span>{{ $menu->stock }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Product actions-->
            {{-- <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">

                <div class=""><a class="btn btn-outline-dark px-4 mt-auto" href="#">Beli</a>
                </div>
            </div> --}}
            <form action="{{ route('cart.store') }}" method="POST"
                class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                @csrf
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                <div class="d-flex justify-content-between align-items-center">
                    <input type="number" name="quantity" value="1" min="1" class="form-control me-2"
                        style="width: 70px;">
                    @if ($menu->stock < 1)
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#confirmationDelete-{{ $menu->id }}">Add to Cart</button>
                        @include('partials.alert')
                    @else
                        <button type="submit" class="btn btn-outline-dark">Add to Cart</button>
                    @endif
                </div>
            </form>



        </div>
    </div>
@endforeach


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#categorySelect').on('change', function() {
        const category = $(this).val();
        $.get('/menu/ajax', {
            category: category
        }, function(data) {
            $('#menuList').html(data);
        });
    });
</script>
