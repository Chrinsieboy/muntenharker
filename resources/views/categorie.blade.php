<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="categories">
                    <div class="categories-left">
                        <div class="text-center box-total">
                            <h3 style="font-size: 20px;color: #f2f2f2;">Aantal Categorieën</h3>
                            <h2 style="font-size: 30px;color: #f2f2f2;">{{ $categories_count }}</h2>
                        </div>
                        <div class="list">
                            <div class="list">
                                @if (count($categories_all) < 1)
                                    <p class="text-center">Er zijn geen categorieën</p>
                                @else
                                    <table class="all-categories lineheight-20">
                                        <thead>
                                            <tr>
                                                <th>Categorie Naam</th>
                                                <th>Categorie aangemaakt</th>
                                                <th></th>
                                            <tr>
                                        </thead>
                                        @foreach ($categories_all as $categorie)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $categorie->name }}</td>
                                                    <td>{{ $categorie->created_at->isoformat('D-M-Y') }}</td>
                                                    <td>
                                                        <form method="post" class="text-center"
                                                            action="{{ route('categorie.destroy', $categorie->id) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm red">X</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="categories-right">
                        <h1 class="text-center" style="font-size: 50px;margin-bottom: 5px;">Categorieën</h1>
                        <div class="form">
                            <form method="post" class="form">
                                @csrf
                                @if ($categories_count > 4)
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
                                    <div style="border-left-width:4px; --tw-border-opacity: 1;border-color: rgb(204 51 0 / var(--tw-border-opacity)); --tw-bg-opacity: 1;background-color: rgb(194 41 0 / var(--tw-bg-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 82 82 / var(--tw-bg-opacity));padding: 1rem;"
                                        role="alert">
                                        <p class="font-bold" style="font-weight: 700;color: #f2f2f2;">Let op</p>
                                        <p style="color: #f2f2f2;">U kunt geen nieuwe categorieën toevoegen.</p>
                                    </div>
                                    <br>

                                    <label for="name">Titel (maximaal 15 karakters)</label>
                                    <input disabled class="form-control" type="text" name="name" id=""
                                        placeholder="Naam">
                                    <button type="submit" style="cursor: not-allowed" disabled
                                        class="btn-categories">Toevoegen</button>
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
                                    <div style="border-left-width:4px; --tw-border-opacity: 1;border-color: rgb(249 115 22 / var(--tw-border-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 237 213 / var(--tw-bg-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 237 213 / var(--tw-bg-opacity));padding: 1rem;"
                                        role="alert">
                                        <p class="font-bold" style="font-weight: 700;">Let op</p>
                                        <p>U kunt maximaal 5 categorieën toevoegen.</p>
                                    </div>
                                    <br>
                                    <label for="name">Titel (maximaal 15 karakters)</label>
                                    <input class="form-control" maxlength="15" type="text" name="name" id=""
                                        placeholder="Naam" required>
                                    <button type="submit" class="btn-categories">Toevoegen</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
