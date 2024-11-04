<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    <div>
        <table class="table align-middle caption-top table-striped">
            <caption>Tabela de <b>{{ $title }}</b></caption>
            <thead>
            <tr>
                @php $cont=0; @endphp
                @foreach ($header as $item)
    
                    @if($hide[$cont])
                        <th scope="col" class="d-none d-md-table-cell">{{ strtoupper($item) }}</th>
                    @else
                        <th scope="col">{{ strtoupper($item) }}</th>
                    @endif
                    @php $cont++; @endphp
    
                @endforeach
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="d-none d-md-table-cell">{{ $item[$header[0]] }}</td>
                        @isset($item->GeradorResiduo)<td>{{$item->GeradorResiduo->nome}}</td>@endisset
                        @isset($item->Catador)<td>{{$item->Catador->nome}}</td>@endisset
                        @isset($item->Residuo)<td>{{$item->Residuo->nome}}</td>@endisset
                        <td class="d-none d-md-table-cell">{{ $item[$header[4]] }}</td>
                        @isset($item->Status)<td>{{$item->Status->descricao}}</td>@endisset
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>