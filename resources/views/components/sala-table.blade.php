<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3">Tipo</th>
            <th class="px-6 py-3">Nome</th>
            <th class="px-6 py-3">Capacidade</th>
            <th class="px-6 py-3">Descrição</th>
            <th class="px-6 py-3">Situação</th>
            <th class="px-6 py-3">Professor Associado</th>
            <th class="px-6 py-3">Data</th>
            <th class="px-6 py-4">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salas as $sala)
        <tr
            class="odd:bg-white odd:dark:bg-blue-900 even:bg-blue-50 even:dark:bg-blue-800 border-b dark:border-blue-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-whitepx-6">
                {{$sala->tipo}}</th>
            <td class="px-6 py-4">{{ $sala->nome}}</td>
            <td class="px-6 py-4">{{$sala->capacidade}}</td>
            <td class="px-6 py-4">{{$sala->descricao}}</td>
            <td class="px-6 py-4">{{$sala->situacao}}</td>
            <td class="px-6 py-4">{{$sala->professor->user->name ?? 'Nenhum Professor Associado'}}</td>
            <td class="px-6 py-4">{{$sala->data}}</td>
            <td class="px-6 py-4 flex flex-col gap-2">
                <button type="button" class="text-blue-500 hover:underline" onclick="openSalaModal('{{ $sala->id }}')">
                    Editar
                </button>
                <a href="{{ route('sala.deletar', ['id' => $sala->id]) }}" class="text-red-500 hover:underline" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $sala->id }}').submit();">
                    Deletar
                </a>
                <form id="delete-form-{{ $sala->id }}"
                    action="{{ route('sala.deletar', ['id' => $sala->id]) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>