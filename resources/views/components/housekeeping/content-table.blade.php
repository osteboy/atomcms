<div class="card mb-4 overflow-hidden">
    <div class="card-title bg-atom p-2 text-center text-white fw-bold fs-6">
        {{ $title }}
    </div>

    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="fw-semibold text-disabled">
                    <tr class="align-middle">
                        {{ $header }}
                    </tr>
                </thead>

                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>

        @isset($footer)
            <div class="mt-4">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
