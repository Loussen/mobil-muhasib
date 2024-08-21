@if($entry)
    @php
        $getCustomerInfo = \App\Models\CustomerInfo::where('customer_id',$entry->id)->first();
        $getCustomerInfo->workers = json_decode($getCustomerInfo->workers,true);
        $getCustomerInfo->stores = json_decode($getCustomerInfo->stores,true);
        $getCustomerInfo->direction_action = json_decode($getCustomerInfo->direction_action,true);
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
                                                <th>Obyekt adı</th>
                                                <th>Address</th>
                                                <th>Post index</th>
                                                <th>Code</th>
                                                <th>Qeydiyyat tarixi</th>
                                                <th>Tip</th>
                                                <th>Icarə haqqı</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCustomerInfo->stores as $getStoreInfo)
                                                <tr>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['name']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['address']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['post_index']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['code']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['registration_date']) }}</span></td>
                                                    <td><span>{{ config('data.store_types')[$getStoreInfo['type']] ?? ' - ' }}</span></td>
                                                    <td><span>{{ in_array($getStoreInfo['type'],[2,3]) ? $getStoreInfo['price'] ?? ' - ' : ' - ' }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getStoreInfo['status']) == 1 ? 'Aktiv' : 'Deaktiv'  }}</span></td>
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
                                                <th>Father name</th>
                                                <th>Phone</th>
                                                <th>Position</th>
                                                <th>Registration date</th>
                                                <th>Salary</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Xitam verilmə tarixi</th>
                                                <th>Bildiriş faylı</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCustomerInfo->workers as $getWorkerInfo)
                                                <tr>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['name']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['surname']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['father_name']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['phone']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['position']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['registration_date']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['salary']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['email']) }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getWorkerInfo['work_status']) == 1 ? 'İşləyir' : 'Xitam verilib'}}</span></td>
                                                    <td><span>{{ $getWorkerInfo['work_status'] == 0 ? $getWorkerInfo['termination_date'] ?? ' - ' : ' - ' }}</span></td>
                                                    <td><span><a href="{{ Storage::url('notifications/'.$getWorkerInfo['notification_file']) }}">Faylı Endir</a></span></td>
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
                                                <th>Kodu</th>
                                                <th>Fəaliyyət istiqaməti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCustomerInfo->direction_action as $getDirectionInfo)
                                                @php
                                                    $getDirection = \App\Models\DirectionActions::find($getDirectionInfo['direction_id'])
                                                @endphp
                                                <tr>
                                                    <td><span>{{ $getDirection->code }}</span></td>
                                                    <td><span>{{ htmlspecialchars($getDirection->name) }}</span></td>
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
