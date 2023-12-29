<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3">Tipo</th>
            <th class="px-6 py-3">Nome</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3">CPF</th>
            <th class="px-6 py-3">RG</th>
            <th class="px-6 py-3">Telefone</th>
            <th class="px-6 py-3">Endereço</th>
            <th class="px-6 py-3">Cidade</th>
            <th class="px-6 py-3">Estado</th>
            <th class="px-6 py-3">CEP</th>
            <th class="px-6 py-3">Curso</th>
            <th class="px-6 py-3">Instituição</th>
            <th class="px-6 py-3">Periodo</th>
            <th class="px-6 py-3">Turno</th>
            <th class="px-6 py-3">Matricula</th>
            <th class="px-6 py-3">Situação</th>
            <th class="px-6 py-3">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alunos as $aluno)
        <tr
            class="odd:bg-white odd:dark:bg-blue-900 even:bg-blue-50 even:dark:bg-blue-800 border-b dark:border-blue-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-whitepx-6">
                Aluno</th>
            <td class="px-6 py-4">{{ $aluno->user->name ?? 'N/A'}}</td>
            <td class="px-6 py-4">{{ $aluno->user->email ?? 'N/A'}}</td>
            <td class="px-6 py-4">{{$aluno->cpf}}</td>
            <td class="px-6 py-4">{{$aluno->rg}}</td>
            <td class="px-6 py-4">{{$aluno->telefone}}</td>
            <td class="px-6 py-4">{{$aluno->endereco}}</td>
            <td class="px-6 py-4">{{$aluno->cidade}}</td>
            <td class="px-6 py-4">{{$aluno->estado}}</td>
            <td class="px-6 py-4">{{$aluno->cep}}</td>
            <td class="px-6 py-4">{{$aluno->curso}}</td>
            <td class="px-6 py-4">{{$aluno->instituicao}}</td>
            <td class="px-6 py-4">{{$aluno->periodo}}</td>
            <td class="px-6 py-4">{{$aluno->turno}}</td>
            <td class="px-6 py-4">{{$aluno->matricula}}</td>
            <td class="px-6 py-4">{{$aluno->situacao}}</td>
            <td class="px-6 py-4 flex flex-col gap-2">
                <button type="button" class="text-blue-500 hover:underline" onclick="openAlunoModal('{{ $aluno->id }}')">
                    Editar
                </button>
                <a href="{{ route('aluno.deletar', ['id' => $aluno->id]) }}" class="text-red-500 hover:underline" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $aluno->id }}').submit();">
                    Deletar
                </a>
                <form id="delete-form-{{ $aluno->id }}"
                    action="{{ route('aluno.deletar', ['id' => $aluno->id]) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>