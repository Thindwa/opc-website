

@if($title)
    <h4 class="text-center text-dark mb-4">{{ $title }}</h4>
@endif

<div class="table-responsive bg-white rounded-lg shadow-sm p-3 mb-4">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-success">
            <tr>
                @foreach($headers as $header)
                    <th>{!! $header['text'] ?? '' !!}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
            <tr>
                @foreach($row['cells'] ?? [] as $cell)
                <td>
                    @if(($cell['type'] ?? 'text') === 'list')
                        <ul class="list-unstyled">
                            @foreach($cell['list'] ?? [] as $item)
                                <li><i class="fas fa-check-circle text-success mr-2"></i>{{ $item['item'] ?? '' }}</li>
                            @endforeach
                        </ul>
                    @else
                        {!! $cell['value'] ?? '' !!}
                    @endif
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
