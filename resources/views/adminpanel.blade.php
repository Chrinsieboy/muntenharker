<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 style="font-size: 30px" class="text-center">Adminpanel</h1>
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
                    @if (session('success'))
                        <br>
                        <div class="succes">
                            <div style="border-left-width:4px; --tw-border-opacity: 1;border-color: rgb(0 136 0 / var(--tw-border-opacity)); --tw-bg-opacity: 1;background-color: rgb(0 136 0 / var(--tw-bg-opacity)); --tw-bg-opacity: 1;background-color: rgb(0 136 82 / var(--tw-bg-opacity));padding: 1rem;"
                                role="alert">
                                <p class="font-bold" style="font-weight: 700;color: #f2f2f2;">Voltooid</p>
                                <p style="color: #f2f2f2;">{{ session('success') }}</p>
                            </div>
                        </div>
                        <br>
                    @endif
                    <table>
                        <tr>
                            <th>Gebruikers ID</th>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Verified?</th>
                            <th>Gebruiker/Admin</th>
                            <th>Verwijder Gebruiker</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span style="color:rgb(0, 136, 0);">Verified</span>
                                    @else
                                        <span style="color:rgb(255, 0, 0);">Not Verified</span>
                                    @endif
                                    {{-- {{ $user->email_verified_at }} --}}
                                </td>
                                <td class="text-right">
                                    @if ($user->admin)
                                        <p>Admin</p>
                                    @else
                                        <p>Gebruiker</p>
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('adminpanel.destroy', $user->id) }}">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-danger">Verwijder</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
