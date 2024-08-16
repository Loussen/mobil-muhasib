@if($entry)
    @php
        $getCustomerInfo = \App\Models\CustomerInfo::where('customer_id',$entry->id)->first();
    @endphp
    @if($getCustomerInfo)
        <div class="mt-10 mb-10 p-10" style="padding: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <h3>Müştəri məlumatları</h3>
                    <table class="table table-bordered table-striped m-b-0">
                        <tbody>
                        <tr>
                            <td>
                                <strong>Obyekt məlumatları:</strong>
                            </td>
                            <td>
                                <span>
                                    <table class="table table-bordered table-condensed table-striped m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Address</th>
                                                <th>Post index</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCustomerInfo->stores as $getStoreInfo)
                                                <tr>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['address']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['post_index']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['code']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['status']) }}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>İşci məlumatları:</strong>
                            </td>
                            <td>
                                <span>
                                    <table class="table table-bordered table-condensed table-striped m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCustomerInfo->workers as $getWorkerInfo)
                                                <tr>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['name']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['surname']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['phone']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['email']) }}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Fəaliyyət istiqaməti:</strong>
                            </td>
                            <td>
                                <span>
                                    <table class="table table-bordered table-condensed table-striped m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Fəaliyyət 1</th>
                                                <th>Fəaliyyət 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCustomerInfo->direction_action as $getDirectionInfo)
                                                <tr>
                                                    <td><span>{{ htmlspecialchars($getDirectionInfo['direction_1']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getDirectionInfo['direction_2']) }}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    @else
        <div class="alert alert-danger">Not found info</div>
    @endif
@else
    <div class="alert alert-danger">Not found info</div>
@endif
