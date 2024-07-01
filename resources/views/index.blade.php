<x-layout>
    <x-header-layout>
        <x-slot:name>{{ $name }}</x-slot:name>
    </x-header-layout>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4 border border-4 rounded-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="carouselExampleIndicators" class="carousel slide border border-4 rounded-4">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/Logo Untirta.png') }}" style="height: 308px; object-fit: contain" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/instagram.jpeg') }}" style="height: 308px; object-fit: contain" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/pertamina.jpg') }}" style="height: 308px; object-fit: contain" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>