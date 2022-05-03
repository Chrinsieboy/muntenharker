<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="spaardoelen">
                    <div class="spaardoelen-left">
                        @if ($spaardoelen_all->count() < 1)
                            <div class="spaardoelen-none">
                                <div class="box-spaardoel">
                                    <p class="text-center" style="font-size: 20px;">Er zijn geen spaardoelen</p>
                                </div>
                            </div>
                        @else
                            <div class="spaardoelen-list">
                                @foreach ($spaardoelen_all as $spaardoel)
                                    <div class="box-spaardoel">
                                        <?php
                                        $time = date(`d-m-Y`);
                                        $date1 = new DateTime($time);
                                        $date2 = new DateTime($spaardoel->EndDate);
                                        $diff = $date2->diff($date1);
                                        $days = $diff->format('%a');
                                        ?>
                                        <form method="post" class="spaardoel-form"
                                            action="{{ route('spaardoelen.destroy', $spaardoel->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="spaardoel-x btn btn-danger btn-sm">X</button>
                                        </form>
                                        <p class="spaardoel-name">{{ $spaardoel->name }} </p>
                                        <p class="spaardoel-value">€ {{ $spaardoel->value }}</p>
                                        @if ($date1 > $date2)
                                            <p class="spaardoel-expired"><i class="fas fa-exclamation-triangle"></i>
                                                Verlopen
                                            </p>
                                        @else
                                            <p class="spaardoel-days-left"><i class="fas fa-calendar-day"></i>
                                                {{ $days + 1 }} dagen over </p>
                                        @endif
                                        <p class="spaardoel-created"><i class="fas fa-calendar-plus"></i>
                                            {{ $spaardoel->created_at->isoformat('D-MM-Y') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="spaardoelen-right">
                        <h1 class="text-center" style="font-size: 50px;margin-bottom: 5px;">Spaardoelen</h1>
                        <form method="POST" class="form">
                            @if (count($spaardoelen_all) > 8)
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
                                    <p style="color: #f2f2f2;">U kunt geen nieuwe spaardoelen toevoegen.</p>
                                </div>
                                <br>
                                @csrf
                                <label for="name">Titel</label>
                                <input disabled class="form-control" type="text" name="name" id="" placeholder="Naam"
                                    required>
                                <label for="value">Hoeveelheid</label>
                                <input disabled class="form-control" type="number" step="0.01" name="value"
                                    placeholder="Bijvoorbeeld 5 of 10" required>
                                <label for="name">Einddatum</label>
                                <input disabled class="form-control" type="date" name="EndDate" id=""
                                    class="" required>
                                <button disabled type="submit" class="btn-spaardoelen">Verzenden</button>
                            @else
                                @csrf
                                <div style="border-left-width:4px; --tw-border-opacity: 1;border-color: rgb(249 115 22 / var(--tw-border-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 237 213 / var(--tw-bg-opacity)); --tw-bg-opacity: 1;background-color: rgb(255 237 213 / var(--tw-bg-opacity));padding: 1rem;"
                                    role="alert">
                                    <p class="font-bold" style="font-weight: 700;">Let op</p>
                                    <p>U kunt maximaal 9 spaardoelen toevoegen.</p>
                                </div>
                                <br>
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
                                <label for="value">Hoeveelheid</label>
                                <input class="form-control" type="number" step="0.01" min="0.01" max="999999.99"
                                    name="value" placeholder="Bijvoorbeeld 5 of 10" required>
                                <label for="name">Einddatum</label>
                                <input class="form-control" type="date" min="{{ $today }}" max="31-12-9999"
                                    name="EndDate" id="" class="" required>
                                <button type="submit" class="btn-spaardoelen">Verzenden</button>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
