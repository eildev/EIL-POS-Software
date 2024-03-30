@if ($units->count() > 0)
    @foreach ($units as $key => $unit)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $unit->name ?? '' }}</td>
            <td>
                {{ $unit->related_to_unit ?? '' }}
            </td>
            <td>
                {{ $unit->related_sign ?? '' }}
            </td>
            <td>
                {{ $unit->related_by ?? '' }}
            </td>
            <td>
                <a href="#" class="btn btn-primary btn-icon unit_edit" data-id={{ $unit->id }}
                    data-bs-toggle="modal" data-bs-target="#edit">
                    <i data-feather="edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-icon unit_delete" data-id={{ $unit->id }}>
                    <i data-feather="trash-2"></i>
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6">
            <div class="text-center text-warning mb-2">Data Not Found</div>
            <div class="text-center">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">Add
                    Category<i data-feather="plus"></i></button>
            </div>
        </td>
    </tr>
@endif
