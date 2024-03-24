@if ($categories->count() > 0)
    @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $category->name ?? '' }}</td>
            <td>
                <button class="btn btn-success">Status</button>
            </td>
            <td>
                <a href="#" class="btn btn-primary btn-icon">
                    <i data-feather="edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-icon">
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
                <button class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModalLongScollable">Add Category<i
                        data-feather="plus"></i></button>
            </div>
        </td>
    </tr>
@endif
