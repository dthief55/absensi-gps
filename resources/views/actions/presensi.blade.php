<x-layout>
    <x-header-layout>
        <x-slot:name>{{ $name ?? '' }}</x-slot:name>
    </x-header-layout>

    <x-slot:name>{{ $name ?? '' }}</x-slot:name>

    <div class="container px-4 mx-auto w-50">
        <div class="container px-4 mx-auto w-50 border border-primary border-3 rounded-5">
            <div class="row py-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </div>
            <div class="row py-1">
                <p style="text-align: center">
                    {{ $name ?? '' }}
                    <br>
                    No ID: {{ $id ?? '' }}
                </p>
            </div>
            <div class="row py-1" style="justify-content: center">
                <div id="loading_spinner" class="spinner-border text-primary" role="status" style="display: none">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div id="success_text" class="text-center" style="color: rgb(36, 107, 213)"></div>
            </div>
            <div class="row py-1">
                <div class="col"></div>
                <button id="presensi_hadir" type="button" class="btn btn-primary col">Submit</button>
                <div class="col"></div>
            </div>
        </div>
        <div class="container px-4 mx-auto w-50">
            <p class="text-center" style="color: rgb(36, 107, 213)">{{ $message ? $message : ''  }}</p>
        </div>
    </div>
</x-layout>