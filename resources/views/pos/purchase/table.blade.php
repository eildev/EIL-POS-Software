@if ($purchase->count() > 0)
    @foreach ($purchase as $index => $data)
        <tr>
            <td class="id">{{ $index + 1 }}</td>
            <td>{{ $data->id ?? 0 }}</td>
            <td>{{ $data->supplier->name ?? '' }}</td>
            <td>{{ $data->purchse_date ?? 0 }}</td>
            <td>
                <ul>
                    @foreach ($data->purchaseItem as $items)
                        <li>{{ $items->product->name ?? '' }}
                            <br>({{ $items->product->barcode ?? '' }})
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>
                ৳ {{ $data->grand_total ?? 0 }}
            </td>
            <td>
                ৳ {{ $data->paid ?? 0 }}
            </td>
            <td>
                ৳ {{ $data->Due ?? 0 }}
            </td>
            <td class="id">
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="{{ route('purchase.invoice', $data->id) }}"><i
                                class="fa-solid fa-file-invoice me-2"></i> Invoice</a>
                        <a class="dropdown-item " href="{{ route('purchase.view.details', $data->id) }}"><i
                                class="fa-solid fa-eye me-2"></i> Show</a>
                        <a class="dropdown-item" href="{{ route('purchase.edit', $data->id) }}"><i
                                class="fa-solid fa-pen-to-square me-2"></i> Edit</a>
                        <a class="dropdown-item" id="delete" href="{{ route('purchase.destroy', $data->id) }}"><i
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
