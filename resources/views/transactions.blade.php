<x-app-layout>
    <div class="py-12">
<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="transactions">
                    <div class="transactions-left">
                        <div class="text-center box-total">
                            <h3 style="font-size: 20px;color: #f2f2f2;">Totaal aantal munten</h3>
                            <h2 style="font-size: 30px;color: #f2f2f2;">€ {{ $transaction_total }}</h2>
                        </div>
                        <div class="list">
                            @if (count($transactions_all) < 1)
                                <p class="text-center">Er zijn geen transacties</p>
                            @else
                                <table class="all-transactions lineheight-12">
                                    <thead>
                                        <tr>
                                            <th>Naam</th>
                                            <th>Categorie</th>
                                            <th>Type</th>
                                            <th>Hoeveelheid</th>
                                            <th>Gemaakt op</th>
                                            <th></th>
                                        <tr>
                                    </thead>
                                    @forelse ($transactions_all as $transaction)
                                        <tbody>
                                            <tr>
                                                <td>{{ $transaction->name }}</td>
                                                <td><a href="/categorie">{{ $transaction->category->name }}</a></td>
                                                <td>{{ $transaction->type }}</td>
                                                <td>&euro;{{ $transaction->value }}</td>
                                                <td>{{ $transaction->created_at->isoformat('D-M-Y') }}</td>
                                                <td>
                                                    <form method="post" class="text-center"
                                                        action="{{ route('transactions.destroy', $transaction->id) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm red">X</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @empty
                                </table>
                            @endif
                            @endforelse
                            </table>
                        </div>
                    </div>
                    <div class="transactions-right">
                        <h1 class="text-center" style="font-size: 50px">Transacties</h1>
                        <div class="form">
                            <form method="post" class="form">
                                @csrf
                                @if (count($categories) < 1)
                                    <div style="border-left-width:4px; --tw-border-opacity: 1;border-color: rgb(249 115 22 / var(--tw-border-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 237 213 / var(--tw-bg-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 237 213 / var(--tw-bg-opacity));padding: 1rem;"
                                        role="alert">
                                        <p class="font-bold" style="font-weight: 700;">Let op</p>
                                        <p>Er zijn geen categorieën die u kan toevoegen.</p>
                                    </div>
                                @else
                                    @if (session('error'))
                                        <div class="error">
                                            <div style="border-left-width:4px; --tw-border-opacity: 1;border-color: rgb(204 51 0 / var(--tw-border-opacity)); --tw-bg-opacity: 1;background-color: rgb(194 41 0 / var(--tw-bg-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 82 82 / var(--tw-bg-opacity));padding: 1rem;"
                                                role="alert">
                                                <p class="font-bold" style="font-weight: 700;color: #f2f2f2;">Let
                                                    op</p>
                                                <p style="color: #f2f2f2;">{{ session('error') }}</p>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                    <label for="name">Titel (maximaal 15 karakters)</label>
                                    <input class="form-control" type="text" name="name" id="" maxlength="15"
                                        placeholder="Naam" required>
                                    <label for="value">Hoeveelheid (maximaal 999.999,99)</label>
                                    <input class="form-control" type="number" step="0.01" min="0.01" max="999999.99"
                                        name="value" placeholder="Bijvoorbeeld 5 of 10" required>
                                    <label for="type">Type</label>
                                    <select class="form-control" name="type" required>
                                        <option value="+" class="">+</option>
                                        <option value="-" class="">-</option>
                                    </select>
                                    <label for="category">Categorieën</label>

                                    <select class="form-control" name="category" id="" class="">
                                        @if (count($categories) < 1)
                                            <option disabled selected value="0">Er zijn geen categorieën</option>
                                        @else
                                            <option disabled selected>Kies een categorie</option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>


                                    <button type="submit" class="btn-transactions">Toevoegen</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
