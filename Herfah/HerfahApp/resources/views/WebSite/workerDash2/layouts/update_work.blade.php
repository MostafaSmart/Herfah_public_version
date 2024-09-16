<div id="form_updatew">

    <form method="POST" style="width: 80% ; margin-right: 20px" action="{{ route('portfoli.store') }}" enctype="multipart/form-data">
        <h4>اضافة عمل</h4>
        <hr>
        @csrf
        @method('PUT')
        <input type="text" hidden name="w_id" value="{{ $worker->id }}">
        <div class="form-group">

            <label for=about>وصف العمل</label>
            <input type="text" placeholder="ادخل وصف للعمل" id="about" class="form-control" name="about" >

        </div>

        <hr>
         
        <label for="">يمكنك تحديد صورة لحذفها</label>
        <div style="display: flex" id="img_cont" ></div>

        
        <hr>
        <div class="form-group">

            <label for=l_name>اختر صور للعمل</label>
            <input type="file" class="form-control" name="photos[]" multiple>
            

        </div>
       
   
        
   
        <div class="form-group" >
        
            <div class="row mt-5">

        
            <button type="submit" class="btn btn-primary btn-block">حفظ التغيرات</button>            
       
        
        
        
            <button type="button" onclick="closeForm('#add_work','#work_table')" class="btn btn-default btn-block">الغاء</button>
        
        </div>
    
    </div>

    </form>
</div>