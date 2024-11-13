<x-layout title="Temporadas de {!! $series->nome !!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season) }}">
                    Temporada {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
{{--                    {{ $season->episodes()->watched()->count() }} /{{ $season->episodes->count() }}--}}
{{--                    {{ $season->episodes->filter(fn ($episode) => $episode->watched)->count() }} /{{ $season->episodes->count() }}--}}
                    {{ $season->numberOfWatchedEpisodes() }} /{{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
