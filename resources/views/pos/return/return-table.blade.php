@if ($returns->count() > 0)
    @foreach ($returns as $index => $data)
        <tr>
            <td class="id">{{ $index + 1 }}</td>
            <td>
                <a href="">
                    #{{ $data->sale_id ?? 0 }}
                </a>

            </td>
            <td>
                {{ $data->customer->name ?? 0 }}
            </td>
            <td>
                <ul>
                    {{-- @dd($data->all()) --}}
                    @foreach ($data->returnItem as $item)
                        <li>{{ $item->product->name ?? '' }}
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>{{ $data->created_at ? \Carbon\Carbon::parse($data->created_at)->format('jS F Y') : '0' }}</td>
            <td>৳ {{ $data->discount_amount ?? 0 }}</td>
            <td>
                ৳ {{ $data->total ?? 0 }}
            </td>
            <td class="id">
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" id="delete"
                            href="{{ route('return.products.delete', $data->id) }}"><i
                                class="fa-solid fa-trash-can me-2"></i>Delete</a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="9"> No Data Found</td>
    </tr>
@endif
