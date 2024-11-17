@extends("layouts.main")

@section("content")
    <div class="dashboard p-6 space-y-6">
        <!-- Header com saldo, receita e despesa -->
        <div class="flex justify-between items-center bg-gray-100 p-4 rounded-md shadow-md">
            <div>
                <h2 class="text-xl font-semibold">Resumo do Mês</h2>
                <p class="text-gray-600">Veja o balanço financeiro deste mês.</p>
            </div>
            <div class="flex space-x-8">
                <div class="text-center">
                    <h3 class="text-lg font-bold text-green-500">Receita</h3>
                    <p class="text-2xl">R$ {{ $income }}</p>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-bold text-red-500">Despesa</h3>
                    <p class="text-2xl">R$ {{ $expense }}</p>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-bold text-blue-500">Saldo</h3>
                    <p class="text-2xl">R$ {{ $balance }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center bg-white p-4 rounded-md shadow-md">
            <form method="GET" action="{{ route('transactions.index') }}" class="flex space-x-4">
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Mês</label>
                    <select id="month" name="month" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @foreach($months as $month)
                            <option value="{{ $month['value'] }}">{{ $month['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Todas</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Todos</option>
                        <option value="receita">Receita</option>
                        <option value="despesa">Despesa</option>
                    </select>
                </div>

                <button type="submit" class="self-end bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Filtrar
                </button>
            </form>
        </div>

        <!-- Lista de Transações -->
        <div class="bg-white p-4 rounded-md shadow-md">
            <h3 class="text-xl font-semibold mb-4">Transações do Mês Atual</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="{{ $transaction->type == 'receita' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ ucfirst($transaction->type) }}
                                </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-500">R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhuma transação encontrada para este mês.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
