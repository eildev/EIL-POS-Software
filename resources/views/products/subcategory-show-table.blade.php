@php
    $serialNumber = 1;
@endphp
@if ($subcategories->count() > 0)
@foreach($subcategories as $key => $subcategory)
<tr>
<td>{{$serialNumber++}}</td>
<td>{{$subcategory->name?? ''}}</td>
<td>{{$subcategory->slug?? ''}}</td>
<!-- <td><img src="{{asset('uploads/subcategory/'.$subcategory->image)}}" alt="Sub category Image"></td> -->
<td>@if($subcategory->status == 0)
    <a href="" class="btn btn-sm bg-success">Active</a>
    @else
    <a href="" class="btn btn-sm bg-warning">Inactive</a>
    @endif
</td>
<td><a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-sm btn-xs bg-info" data-bs-toggle="modal"
                    data-bs-target="#exampleModalLongScollableEdit" ><i class="edit-icon "  data-feather="edit"></i></a>
    <a href=""class="btn btn-sm btn-xs bg-danger delete-subcategory" data-subcategory-id="{{$subcategory->id}}"><i class="delete-icon" data-feather="trash-2"></i> </a>
</td>
</tr>
@endforeach
@else
    <td colspan="6">
        <div class="text-center text-warning mb-2">Data Not Found</div>
        <div class="text-center">
            <button class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModalLongScollable">Add SubCategory<i
                    data-feather="plus"></i></button>
        </div>
    </td>
@endif

