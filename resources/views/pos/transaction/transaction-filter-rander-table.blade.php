
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h6 class="card-title text-info ">Transaction History </h6>
            <div class="table-responsive">
                <table class="table" >
                    <thead class="action ">
                        <tr>
                            <th>SN</th>
                            <th>Details</th>
                            <th>Transaction Date</th>
                            <th>Amount</th>
                            <th>Transaction Type</th>
                            <th>Transaction Method</th>
                            <th>Note</th>
                            <th class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody  class="showData">
                        @if ($transaction->count() > 0)
                        @foreach ($transaction as $key => $trans)
                        <tr>
                        <td>{{$key+1}}</td>
                        @if($trans->customer_id  != NULL )
                        <td> Customer <br> Name: {{$trans['customer']['name']}} <br> Phone: {{$trans['customer']['phone']}}</td>
                        @elseif ($trans->supplier_id  != NULL)
                        <td>Supplier <br> Name: {{$trans['supplier']['name']}} <br> Phone: {{$trans['supplier']['phone']}}</td>
                        @endif
                        <td>{{$trans->date}}</td>
                        <td>{{$trans->debit}}</td>
                        <td>
                            @if($trans->payment_type  == 'pay' )
                            <span>Cash Payment</span>
                            @else
                            <span>Cash Received</span>
                            @endif
                        <td>{{$trans['paymentMethod']['name']}}</td>
                        <td class="note_short"> @php
                            $note = $trans->note;
                            $noteChunks = str_split($note, 20);
                            echo implode("<br>", $noteChunks);
                            @endphp</td>
                        <td class="actions">
                            <a href="{{route('transaction.invoice.receipt',$trans->id)}}" class="btn btn-sm btn-primary " title="Print">
                            <i class="fa fa-print"></i><span style="padding-left: 5px">Receipt</span>
                            </a>
                            <a href="{{route('transaction.delete',$trans->id)}}" id="delete" class="btn btn-sm btn-danger " title="Delete">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                <tr>
                    <td colspan="12">
                        <div class="text-center text-warning mb-2">Data Not Found</div>
                        {{-- <div class="text-center">
                            <a href="{{route('transaction.add')}}" class="btn btn-primary">Add Transaction<i
                                    data-feather="plus"></i></a>
                        </div> --}}
                    </td>
                </tr>

                @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

