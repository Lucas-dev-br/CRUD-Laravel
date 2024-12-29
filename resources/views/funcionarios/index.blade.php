@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-8 max-w-7xl">
    <div class="flex justify-between items-center py-4">
        <h1 class="text-2xl font-bold text-black-600">Lista de Funcionários</h1>
        <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-400 transition duration-300" onclick="openAddModal('{{ route('funcionarios.store') }}')">
            Adicionar Funcionário
        </button>
    </div>

    <div class="overflow-x-auto shadow border border-gray-200 rounded-lg">
        <table class="w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">CPF</th>
                    <th class="px-4 py-2 text-left">Data de Nascimento</th>
                    <th class="px-4 py-2 text-left">Telefone</th>
                    <th class="px-4 py-2 text-left">Gênero</th>
                    <th class="px-4 py-2 text-center">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($funcionarios as $funcionario)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="px-4 py-2">{{ $funcionario->id }}</td>
                        <td class="px-4 py-2">{{ $funcionario->nome }}</td>
                        <td class="px-4 py-2">{{ $funcionario->cpf }}</td>
                        <td class="px-4 py-2">{{ $funcionario->data_nascimento }}</td>
                        <td class="px-4 py-2">{{ $funcionario->telefone }}</td>
                        <td class="px-4 py-2">{{ $funcionario->genero }}</td>
                        <td class="px-4 py-2 text-center">
                            <button href="" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition duration-300" onclick="openEditModal('{{ route('funcionarios.update', $funcionario->id) }}', {{ $funcionario }})">
                                Editar
                            </button>
                            
                                    <button onclick="openDeleteModal('{{ route('funcionarios.destroy', $funcionario->id) }}')" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                        Deletar
                                    </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-500">Nenhum funcionário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @include('components.modal-funcionario')
        @include('components.modal-delete')
    </div>
</div>
@endsection
