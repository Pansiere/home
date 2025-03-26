<div class="dashboard space-y-6">
    <!-- Header -->
    <div class="flex flex-col items-center bg-white rounded-lg shadow-md mt-4">
        <h2 class="text-3xl font-semibold text-gray-900">Resumo do mês</h2>
    </div>

    <!-- Finance Summary -->
    <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-4 gap-2">
        <!-- Receita -->
        <x-finance-card title="Receita" :value="2200" colorClass="text-green-600" />

        <!-- Despesa -->
        <x-finance-card title="Despesa" :value="600" colorClass="text-red-600" />

        <!-- Saldo -->
        <x-finance-card title="Saldo" :value="1600" colorClass="text-blue-600" />

        <!-- Gráfico de Categorias -->
        <div class="col-span-3 sm:col-span-1 bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <h3 class="text-lg sm:text-1xl font-semibold text-gray-800 text-center mb-4">Despesa por Categoria</h3>
            <div class="flex justify-center w-full">
                <canvas id="categoriesChart" class="w-full h-64 max-w-4xl"></canvas>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white p-4 rounded-md shadow-md">
        <form method="GET" action="{{-- route('transactions.index') --}}">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <!-- Filtro Ano -->
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Ano</label>
                    <select id="year" name="year"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        {{-- @if (isset($years[0])) --}}
                        <option value="0">Todos</option>
                        {{-- @endif --}}
                        {{-- @foreach ($years as $year) --}}
                        <option value="{{-- $year --}}" {{-- $year == $selectedYear ? 'selected' : '' --}}>
                            {{-- $year --}}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>

                <!-- Filtro Mês -->
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Mês</label>
                    <select id="month" name="month"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        {{-- @if (isset($months[0])) --}}
                        <option value="0">Todos</option>
                        {{-- @endif --}}
                        {{-- @foreach ($months as $month) --}}
                        {{-- @if (is_array($month) && isset($month['number'], $month['name'])) --}}
                        <option value="{{-- $month['number'] --}}" {{-- $month['number'] == $selectedMonth ? 'selected' : '' --}}>
                            {{-- ucfirst($month['name']) --}}
                        </option>
                        {{-- @endif --}}
                        {{-- @endforeach --}}
                    </select>
                </div>

                <!-- Filtro Categoria -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select id="category_id" name="category_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="0">Todas</option>
                        {{-- @foreach (auth()->user()->categories as $category) --}}
                        <option value="{{-- $category->id --}}" {{-- $selectedCategoryId == $category->id ? 'selected' : '' --}}>
                            {{-- Crypt::decryptString($category->name) --}}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>

                <!-- Filtro Tipo -->
                <div>
                    <label for="typeId" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select id="typeId" name="typeId"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="0">Todos</option>
                        <option value="1" {{-- $selectedTypeId == 1 ? 'selected' : '' --}}>Receita</option>
                        <option value="2" {{-- $selectedTypeId == 2 ? 'selected' : '' --}}>Despesa</option>
                    </select>
                </div>
            </div>

            <!-- Botão de Filtrar -->
            <div class="sm:col-span-2 flex justify-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    {{-- @if (session('success')) --}}
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
        {{-- session('success') --}}
    </div>
    {{-- @endif --}}

    <!-- Exibição de transações em forma de cartões -->
    <div class="bg-white p-4 rounded-md shadow-md">
        <!-- Botão Adicionar Transação -->
        <div class="flex justify-center mb-4">
            <a href="{{-- route('transactions.create') --}}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">
                + Adicionar Transação
            </a>
        </div>

        <div class="sm:grid sm:grid-cols-2 xl:grid-cols-{{-- $quantityColumns --}}  sm:gap-4">
            {{-- @foreach ($transactions as $transaction) --}}
            <div class="mb-4 bg-gray-50 rounded-md shadow-sm flex justify-between items-center">
                <!-- Informações principais (data e descrição) -->
                <div class="flex-1 min-w-0">
                    <h4 class="text-lg font-semibold text-gray-800">
                        {{-- date('d/m/Y', strtotime($transaction->date)) --}}</h4>
                    <p class="text-sm text-gray-500 break-words">
                        {{-- Crypt::decryptString($transaction->description) --}}</p>
                    <p class="text-sm text-gray-600"><strong>Categoria:</strong>
                        {{-- Crypt::decryptString($transaction->category->name) --}}</p>
                </div>

                <!-- Valor e tipo -->
                <div class="text-right flex-shrink-0 ml-4">
                    <span class="text-sm font-semibold 
            {{-- $transaction->type->type === 'Receita' ? 'text-green-500' : 'text-red-500' --}}">
                        {{-- $transaction->type->type --}}
                    </span>
                    <p class="text-gray-800">
                        R${{-- number_format(num: $transaction->value, decimals: 2, decimal_separator: ',', thousands_separator: '.') --}}
                    </p>
                </div>

                <!-- Ícones de editar e excluir -->
                <div class="flex space-x-2 flex-shrink-0 ml-4">
                    <a href="{{-- route('transactions.edit', $transaction) --}}" class="text-yellow-500 hover:text-yellow-600">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{-- route('transactions.destroy', $transaction->id) --}}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja excluir esta transação?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
        {{-- @if ($transactions->isEmpty()) --}}
        <div class="flex justify-center items-center py-4">
            <p class="text-red-500 text-sm bg-red-100 border border-red-400 rounded-md px-4 py-2">
                Nenhuma transação encontrada.
            </p>
        </div>
        {{-- @endif --}}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
