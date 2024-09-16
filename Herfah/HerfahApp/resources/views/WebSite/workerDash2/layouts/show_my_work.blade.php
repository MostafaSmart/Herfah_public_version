<div class="row">
    <div class="col-15">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> اعمالي</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed">
            <thead>

              <tr>
                <th>صورة</th>
                <th>وصف</th>
                <th>ت.النشر</th>
                <th>عرض</th>
                <th>تعديل</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($portfolis as $portfoli)
                @php
                    $imagePaths = explode(',', $portfoli->Images);
                    $imagePath = trim($imagePaths[0]);
                @endphp
                <tr>

                    <td><img style="height: 100px;width: 100px;" src="{{ URL::asset($imagePath) }}" alt=""></td>
                    <td>{{ $portfoli->About_Project }}</td>
                    <td>{{ $portfoli->created_at }}</td>
                    <td><button onclick="showWorkeDetels({{ $portfoli }},'{{ route('portfoli.update', $portfoli) }}')" class="but4">عرض</button></td>
                    <td><button onclick="confirm_del({{ $portfoli }},'{{ route('portfoli.destroy', $portfoli) }}')" class="but4">حذف</button></td>

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
