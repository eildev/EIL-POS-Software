@extends('master')
@section('admin')

<div class="row">
<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title text-info">Account Transaction List</h6>

                    <div id="" class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Account</th>
                                    <th>Branch Name</th>
                                    <th>Purpose</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody class="showData">
                            @if ($accountTransaction->count() > 0)
                            @foreach ($accountTransaction as $key => $acountData)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $acountData['bank']['name'] ?? ''}}</td>
                                <td>{{ $acountData['branch']['name'] ?? ''}}</td>
                                <td>{{ $acountData->purpose ?? ''}}</td>
                                <td>{{ $acountData->debit ?? ''}} TK</td>
                                <td>{{ $acountData->credit ?? ''}}TK</td>
                                <td>{{ $acountData->balance ?? ''}}TK</td>
                                <td> @php
                                    $text = $acountData->note ?? '';
                                    $chunks = str_split($text, 40);
                                    @endphp
                                 @foreach ($chunks as $chunk)
                                      {{ $chunk }}<br>
                                  @endforeach
                                  </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">
                                <div class="text-center text-warning mb-2">Data Not Found</div>

                            </td>
                        </tr>
                       @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection


