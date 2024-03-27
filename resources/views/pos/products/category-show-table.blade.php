@if ($categories->count() > 0)
    @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $category->name ?? '' }}</td>
            <td>
                <img src="{{ $category->image ? asset('uploads/category/' . $category->image) : asset('dummy/image.jpg') }}"
                    alt="cat-image">
            </td>
            <td>
                <button class="btn btn-success">Status</button>
            </td>
            <td>
                <a href="#" class="btn btn-primary btn-icon category_edit" data-id={{ $category->id }}
                    data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">
                    <i data-feather="edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-icon" data-id={{ $category->id }}>
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
