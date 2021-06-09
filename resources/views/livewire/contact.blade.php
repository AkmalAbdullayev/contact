<div>
    <div class="d-inline">
        <div class="d-inline-block mb-2">
            <span class="d-inline-block">Show</span>
            <span class="d-inline-block">
                <select id="entries" class="form-control form-control-sm">
                    <option disabled selected>Select...</option>
                    @for($i = 5; $i <= 20; $i += 5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </span>
            <span class="d-inline-block">entries</span>
        </div>

        <div class="d-inline-block" style="float: right">
            <span class="d-inline-block"><label for="search">Search: </label></span>
            <span class="d-inline-block">
                <input
                    type="search"
                    id="search_contact"
                    wire:model="search"
                    class="form-control form-control-sm"
                >
            </span>
        </div>
    </div>

    <x-table>
        <x-slot name="head">
            <x-table.heading>#</x-table.heading>
            <x-table.heading>Full Name</x-table.heading>
            <x-table.heading>Accounts</x-table.heading>
            <x-table.heading>Phone Numbers</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse($contacts as $contact)
                <x-table.row>
                    <x-table.cell>{{ $contact->id }}</x-table.cell>
                    <x-table.cell>{{ $contact->name }}</x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('emails', $contact->id) }}" target="_blank">{{ $contact->emails_count }}
                            accounts</a>
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('numbers', $contact->id) }}"
                           target="_blank">{{ $contact->mobile_numbers_count }} numbers</a>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('contact.edit', $contact->id) }}" method="post">
                                @csrf
                                @method('GET')

                                <button
                                    class="btn btn-sm btn-primary"
                                >
                                    Edit
                                </button>
                            </form>

                            <form action="{{ route('contact.destroy', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Are you sure?');"
                                    class="btn btn-sm btn-danger"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </x-table.cell>
                </x-table.row>
            @empty
                <x-table.cell>Nothing found.</x-table.cell>
            @endforelse
        </x-slot>
    </x-table>

    <div class="mt-2 d-inline">
        <span class="d-inline-block">
            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries
        </span>

        <span class="d-inline-block float-right">{{ $contacts->links() }}</span>
    </div>

</div>

<script>
    let entries = document.getElementById('entries');
    entries.onchange = function (event) {
    @this.set('entries', event.target.value);
    }
</script>
