<div class="row">
    <div class="col-15">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> الطلبات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed">
            <thead>

              <tr>
                <th>م</th>
                <th>وصف</th>
                <th>الحاله</th>
                <th>القيمه</th>
                <th>عدد الايام</th>
                <th>البداء</th>
                <th>اجراء</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
              
                <tr>

                    <td>{{ $order->id }}</td>
                    <td>{{ $order->testimonial }}</td>
                    <td>{{ $order->status }}</td>
                    
                    <td>{{ $order->Amount }}</td>
                    <td>{{ $order->Num_Days }}</td>
                    <td>{{$order->startDate }}</td>

                    {{-- <td><button onclick="showWorkeDetels({{ $portfoli }},'{{ route('portfoli.update', $portfoli) }}')" class="but4">عرض</button></td> --}}
                    

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
