@php
    $bgColors = [
        'success' => '#28a745',
        'warning' => '#ffe60a',
        'info' => '#22a3ff',
        'danger' => '#dc3545',
        'secondary' => '#6c757d',
        'orange' => '#fd7e14',
    ];
@endphp

@foreach ($tables as $table)
    @php
        $headers = $table['headers'] ?? [];
        $rows = $table['rows'] ?? [];
        $title = $table['title'] ?? null;
    @endphp

    @if ($title)
        <h4 class="text-center text-dark mb-4">{{ $title }}</h4>
    @endif

    <div class="table-responsive bg-white rounded-lg shadow-sm p-3 mb-5">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-success">
                <tr>
                    @foreach ($headers as $header)
                        <th>{{ \App\Helpers\HtmlSanitizer::escape($header['text'] ?? '') }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        @foreach ($row['cells'] ?? [] as $cell)
                            @php
                                $bg = $cell['bg'] ?? 'none';
                                $bgStyle = $bg !== 'none' ? "background-color: {$bgColors[$bg]}; color: white;" : '';
                            @endphp
                            <td style="{{ $bgStyle }}">
                                @if (!empty($cell['image']))
                                    <img src="{{ asset('storage/' . $cell['image']) }}" width="80" class="mb-2 d-block">
                                @endif
                                {{ \App\Helpers\HtmlSanitizer::escape($cell['text'] ?? '') }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endforeach
