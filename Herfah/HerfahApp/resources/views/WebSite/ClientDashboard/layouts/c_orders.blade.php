



{{-- <div id="info_form" class="col-md-9"> --}}
    
    
{{--     
        <div class="container" id="cc2">

     
            @foreach ($orders as $order)
            <div class="box">
                <div class="n1">
                    <h3>رقم الطلب</h3>
                    <span>{{ $order->id }}</span>
                </div>
                <hr>
                <div class="n1">
                    <h3>ت. البداء</h3>
                    <span>{{$order->startDate }}</span>
                </div>
                <hr>
                <div class="n1">
                    <h3>الحالة</h3>
                    <span>{{ $order->status }}</span>
                </div>
                <hr>
                <p>
            {{ $order->testimonial }}
                </p>
                <hr>
                <button onclick="showOrderDetels({{ $order }})" class="but4">تفاصيل</button>
            </div>
            @endforeach
     
        </div> --}}

        <div class="row">
            <div class="col-15">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">نوع الطلب</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <select class="input" onchange="selectCing(this.value,{{ $orders }})" on name="o_state" id="o_state">
                            <option value="0">الكل</option>
                            <option value="1">قيد الانتظار</option>
                
                            <option value="2">قيد العمل</option>
                            <option value="3">جاهزة</option>
                
                        </select>  
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed">
                    <thead>
    
                      <tr>
                        <th>ر.الطلب</th>
                        <th>الحالة</th>
                        <th>ت.البداء</th>
                        <th>العامل</th>
                        <th>وصف</th>
                        <th>تفاصيل</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>

                            <td>{{ $order->startDate }}</td>
                            <td><a class="but4">{{ $order->worker_id }} </a></td>
                            <td>{{ $order->testimonial }}</td>
                            <td><button onclick="showOrderDetels({{ $order }})" class="but4">تفاصيل</button></td>

                          </tr>
                          @endforeach
                   
                     
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    
    

{{-- </div> --}}
